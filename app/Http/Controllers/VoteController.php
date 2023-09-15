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
        if ($request->session()->missing('logged_in')) { return redirect('/'); }
        $candidates = User::where('candidate', true)->get();
        $page = 'partials.candidate-list';

        if ($request->header('hx-request')) {
            return view($page, compact('candidates'));
        }

        return view('page', compact('page', 'candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->session()->missing('logged_in')) { return redirect('/'); }

        $candidates_refs = $request->get('candidates');

        if (count($candidates_refs) > 3) {
            return response('', 418)
                ->withHeaders(['HX-Trigger' =>
                json_encode(["alertPopper" => [
                    "alertBGColor" => '#ffc107',
                    "alertHeader" => "Gagal!",
                    "alertMessage" => "Maaf, hanya bisa memilih 3 kandidat!"
                ]])
                ]);
        }

        $candidates = [];
        $voter = session('voter_ref');

        foreach ($candidates_refs as $candidate_ref) {
            $candidate = [
                'voter_ref' => $voter, 
                'ref_voted' => $candidate_ref, 
                'created_at' => now(),
                'updated_at' => now()];
            array_push($candidates, $candidate);
        }

        Vote::insert($candidates); 
        $request->session()->flush();

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
