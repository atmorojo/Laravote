<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->session()->missing('voter_ref')) {
            return redirect('/check');
        }

        $settings = \App\Models\Setting::all()->first();
        $candidates = User::where('candidate', true)->get();
        $page = 'partials.candidate-list';

        if ($request->header('hx-request')) {
            return view($page, compact('candidates', 'settings'));
        }

        return view('page', compact('page', 'candidates', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->session()->missing('voter_ref')) { return redirect('/'); }

        $candidates_refs = $request->get('candidates');
        $settings = \App\Models\Setting::all()->first();

        if (count($candidates_refs) > $settings->max_vote) {
            return response('', 418)
                ->withHeaders(['HX-Trigger' =>
                json_encode(["alertPopper" => [
                    "alertBGColor" => '#ffc107',
                    "alertHeader" => "Gagal!",
                    "alertMessage" => "Maaf, hanya bisa memilih " . $settings->max_vote . " kandidat!"
                ]])
                ]);
        }

        $candidates = [];
        $voter = session('voter_ref');
        $client = session('client_id');
        $queue_id = session('queue_id');

        foreach ($candidates_refs as $candidate_ref) {
            $candidate = [
                'voter_ref' => $voter, 
                'ref_voted' => $candidate_ref, 
                'created_at' => now(),
                'updated_at' => now()];
            array_push($candidates, $candidate);
        }

        Vote::insert($candidates); 

        \App\Providers\SlotAvailable::dispatch($client, $queue_id);
        $request->session()->forget('voter_ref');
        return response('', 418)
            ->withHeaders(['HX-Trigger' =>
            json_encode(["alertPopper" => [
                "status" => '1',
                "alertBGColor" => '#198754',
                "alertHeader" => "Berhasil!",
                "alertMessage" => "Suara anda telah kami dengar. Terima kasih!"
            ]])
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }


}
