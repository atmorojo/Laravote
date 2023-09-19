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

    if (!$logged_in) {
        return view('page',
            ['page' => 'partials.login']
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

    return redirect('/votes/create');
});

// TODO: move route from get:client to get:root
Route::get('/client', function(Request $request) {
    // Cek client logged in?
    //  - not exist session('client-id')?
    //  -- yes -> give client login page
    //
    //  - session('voter-ref')?
    //  -- yes -> redirect to voting page
    //
    //  - redirect to check page
});

// TODO: move session related stuff from post:login 
Route::get('/check', function(Request $request) {
    // Is the client assigned to a queue?
    // $queue = Queue::where('client', session('client-id'));
    // $queue true?
    // - yes -> redirect to voting page
    // - no -> send '418', "I'm a teapot!"
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

