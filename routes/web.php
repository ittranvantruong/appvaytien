<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignupController;


Route::get('login', [SignupController::class, 'getLogin'])->name('login');
Route::post('login', [SignupController::class, 'postLogin']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('HomePage');
});


Route::view('wallet', 'public.wallet.index');
Route::view('profile', 'public.profile.index');
Route::view('advise', 'public.advise.index');
Route::view('setting', 'public.setting.index');