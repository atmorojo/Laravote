<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\Authenticate;

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
    $voter = Voter::firstWhere('ref', $request->get('ref'));
    if (!$voter) {
        return response()
            ->view(
                'votes.modal',
                ['message' => 'Maaf anda tidak terdaftar dalam sistem.']
            )
            ->withHeaders([
                'HX-Retarget' => '#modal',
                'HX-Reswap' => 'outerHTML',
            ]);

    }

    $request->session()->put('logged_in', '1');
    return redirect('/votes/create');
});

Route::resource('votes', VoteController::class)->only([
    'index', 'create', 'store'
]);

