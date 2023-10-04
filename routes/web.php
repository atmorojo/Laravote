<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use App\Models\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// TODO: move the route from get:root to get:login
Route::get('/voter', function(Request $request) {
    return view('page', ['page' => 'partials.login']);
})->name('login');

Route::post('/login', function(Request $request) {
    $voter = $request->get('ref');

    $user = User::firstWhere('ref', $voter);
    $client = Client::firstWhere('is_empty', true);

    if (!$user) {
        return response('', 401)
            ->withHeaders(['HX-Trigger' => json_encode([
                "alertPopper" => [
                    "alertHeader" => "Perhatian!",
                    "alertMessage" => "Maaf, anda tidak terdaftar dalam sistem!"
                ]])
            ]);
    }

    if (!$client) {
        return response('', 401)
            ->withHeaders(['HX-Trigger' => json_encode([
                "alertPopper" => [
                    "alertHeader" => "Perhatian!",
                    "alertMessage" => "Maaf, belum ada bilik yang tersedia!"
                ]])
            ]);
    }

    \App\Providers\VoterValidated::dispatch($voter, $client->name);
    \App\Providers\SlotOccupied::dispatch($client->name);

    return response('', 401)
        ->withHeaders(['HX-Trigger' => json_encode([
            "alertPopper" => [
                "alertHeader" => "Sukses!",
                "alertMessage" => $user->name . ", silakan ke bilik " . $client->name
            ]])
        ]);
});

// TODO: move route from get:client to get:root
Route::get('/client', function(Request $request) {
    // Cek client logged in?
    $client_id = session('client_id');
    $voter_ref = session('voter_ref');
    $page = 'partials.client';

    if (!$client_id) {
        return view('page', compact('page'));
    }

    if (!$voter_ref) {
        return redirect('/check');
    }

    return redirect('/votes/create');
});

Route::post('/client', function(Request $request) {
    $client_pass = $request->get('ref');
    $client = Client::firstWhere('password', $client_pass);

    if (!$client) {
        return response('', 401)
            ->withHeaders(['HX-Trigger' => json_encode([
                "alertPopper" => [
                    "alertHeader" => "Perhatian!",
                    "alertMessage" => "Maaf, mesin ini tidak terdaftar dalam sistem kami!"
                ]])
            ]);
    }

    session(['client_id' => $client->name]);
    \App\Providers\SlotAvailable::dispatch($client->name);

    return redirect('/check');
    //return response('', 418)->withHeaders(['HX-Location' => '/check']);
});

// TODO: move session related stuff from post:login 
Route::get('/check', function(Request $request) {
    $client = session('client_id');
    if (!$client) { return redirect('/client'); }
    // Is the client assigned to a queue?
    $assignedQueue = \App\Models\Queue::where
        ('client_id', $client)
        ->where('is_done', false)
        ->first();

    // $assignedQueue false?
    if (!$assignedQueue) {

        if ($request->header('hx-request')) {
            return view('partials.check', ['client_id' => $client]);
        }

        return view('page', [
            'page' => 'partials.check',
            'client_id' => $client
        ]);
    }

    \App\Providers\SlotOccupied::dispatch($client);
    session([
        'voter_ref' => $assignedQueue->voter_ref,
        'queue_id' => $assignedQueue->id
    ]);

    return redirect('/votes/create');
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

