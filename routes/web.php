<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\Authenticate;
use App\Models\User;

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
Route::get('/', function(Request $request) {
    $logged_in = session('logged_in');
    $page = 'partials.login';
    $post_endpoint = '/login';

    if (!$logged_in) {
        return view('page',
            compact('page', 'post_endpoint')
        );
    }

    return redirect('/votes/create');
})->name('login');

Route::post('/login', function(Request $request) {
    $voter = $request->get('ref');
    $user = User::firstWhere('ref', $voter);

    if (!$user) {
        return response('', 401)
            ->withHeaders(['HX-Trigger' => json_encode([
                "alertPopper" => [
                    "alertHeader" => "Perhatian!",
                    "alertMessage" => "Maaf, anda tidak terdaftar dalam sistem!"
                ]])
            ]);
    }

    session(['logged_in' => '1']);
    session(['voter_ref' => $voter]);
    // TODO: dispatch VoterValidated

    return redirect('/votes/create');
});

// TODO: move route from get:client to get:root
Route::get('/client', function(Request $request) {
    // Cek client logged in?
    $client_id = session('client_id');
    $voter_ref = session('voter_ref');
    $page = 'partials.login';
    $post_endpoint = '/client';

    if (!$client_id) {
        return view('page', compact('page', 'post_endpoint'));
    }

    if (!$voter_ref) {
        return redirect('/check');
    }

    return redirect('/votes/create');
});

Route::post('/client', function(Request $request) {
    $client_pass = $request->get('ref');
    $client = \App\Models\Client::firstWhere('password', $client_pass);

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
    // TODO: Dispatch SlotAvailable

    return redirect('/check');
});

// TODO: move session related stuff from post:login 
Route::get('/check', function(Request $request) {
    return "Hello /check here";
    // Is the client assigned to a queue?
    // $assignedQueue = Queue::where('client', session('client-id'));
    //
    // $assignedQueue true?
    // - yes ->
    // -- dispatch SlotOccupied event
    // -- redirect to voting page
    //
    // - no -> send '418', "I'm a teapot!"
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

