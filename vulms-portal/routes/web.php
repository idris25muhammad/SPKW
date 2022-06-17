<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::view('apidocs', 'apidocs')->name('apidocs');

    Route::get('challenges/{id}', [\App\Http\Controllers\ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('leaderboards', [\App\Http\Controllers\PentestController::class, 'index'])->name('leaderboards.index');

    Route::get('/flag/{id}', [\App\Http\Controllers\ChallengeController::class, 'submitFlag'])->name('challenge.flag');
    Route::post('challenge.verifikasiflag', [\App\Http\Controllers\ChallengeController::class, 'verifikasiFlag'])->name('verifikasiflag');
    Route::get('badges', [\App\Http\Controllers\BadgeController::class, 'index'])->name('badges.index');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
