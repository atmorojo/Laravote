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

Route::view('/', 'login')->name('login');
Route::post('/login', function(Request $request) {
    if ($request->session()->exists('logged_in')) {
        return redirect('/votes/create');
    }

    $user = User::firstWhere('ref', $request->get('ref'));
    if (!$user) {
        return response(
            json_encode([
                "alertPopper" => NULL,
                "alertType" => "alert-danger",
                "alertHeader" => "Perhatian!",
                "alertMessage" => "Maaf, anda tidak terdaftar dalam sistem!"
            ])
        );
    }

    $request->session()->put('logged_in', '1');
    return redirect('/votes/create');
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

