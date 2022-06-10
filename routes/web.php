<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SettingController;


Route::get('login', [SignupController::class, 'getLogin'])->name('login');
Route::post('login', [SignupController::class, 'postLogin']);
Route::post('register', [SignupController::class, 'postRegister']);
Route::get('logout', [SettingController::class, 'getLogout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('HomePage');
    Route::post('/order', [HomeController::class, 'postLoan']);

    Route::get('/hoso', [UserController::class, 'getProfile'])->name('Profile');

    Route::get('/wallet', [WalletController::class, 'getWallet'])->name('wallet');

    //======================= Group Page Setting ===============================
    Route::get('/xacminh', [UserController::class, 'getXacminh'])->name('xacminh');

    Route::get('/info_canhan', [UserController::class, 'getInfo_canhan']);
    Route::post('/info_canhan', [UserController::class, 'postInfo_canhan']);

    Route::get('/bank', [UserController::class, 'getBank']);
    Route::post('/bank', [UserController::class, 'postBank']);

    Route::get('/thongtin', [UserController::class, 'getThongtin']);
    Route::post('/thongtin', [UserController::class, 'postThongtin']);

    Route::get('/phone', [UserController::class, 'getPhone']);

    //======================= Group Page Setting ===============================
    Route::get('/setting', [SettingController::class, 'getSetting'])->name('setting');
    Route::get('/about-us', [SettingController::class, 'getAboutUs']);
    Route::get('/password', [SettingController::class, 'getPassword']);
    Route::post('/password', [SettingController::class, 'postPassword']);

    Route::view('tuvan', 'public.advise.index');
});

