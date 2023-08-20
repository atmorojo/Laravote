<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
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
        $candidates = Candidate::all();
        return view('votes.create', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->session()->missing('logged_in')) { return redirect('/'); }
        $candidates_refs = $request->get('candidates');
        $candidates = [];
        foreach ($candidates_refs as $candidate_ref) {
            $candidate = ['ref' => $candidate_ref, 'created_at' => now(), 'updated_at' => now()];
            array_push($candidates, $candidate);
        }
        Vote::insert($candidates); 
        $request->session()->flush();
        return response()
            ->view(
                'votes.modal',
                ['message' => 'Suara anda telah kami dengar. Terima kasih!']
            )
            ->withHeaders([
                'HX-Retarget' => '#modal',
                'HX-Reswap' => 'outerHTML',
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
