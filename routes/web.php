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

Route::get('/', function(Request $request) {
    $logged_in = session('logged_in');

    if (!$logged_in) {
        return view('page', ['page' => 'partials.login']);
    }

    return view('page', ['page' => 'partials.candidate-list']);
})->name('login');

Route::post('/login', function(Request $request) {
    $voter = $request->get('ref');
    $user = User::firstWhere('ref', $voter);
    if (!$user) {
        return response('', 401)
            ->withHeaders([
                'HX-Trigger' => json_encode([
                    "alertPopper" => [
                        "alertHeader" => "Perhatian!",
                        "alertMessage" => "Maaf, anda tidak terdaftar dalam sistem!"
                    ]
                ])
            ]);
    }

    session(['logged_in' => '1']);
    session(['voter_ref' => $voter]);
    return view('');
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

