<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserLoanAmountController;
use App\Http\Controllers\SinglePageController;

Route::get('login', [SignupController::class, 'getLogin'])->name('login');
Route::post('login', [SignupController::class, 'postLogin'])->name('post.login');

Route::post('register', [SignupController::class, 'postRegister'])->name('post.register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('HomePage');
    Route::post('/order', [HomeController::class, 'postLoan']);

    Route::get('/hoso', [UserController::class, 'getProfile'])->name('profile');

    Route::get('/wallet', [WalletController::class, 'getWallet'])->name('wallet');

    Route::get('/khoan-vay-cua-toi', [UserLoanAmountController::class, 'index'])->name('user.loan.amount');

    //======================= Group Page Setting ===============================
    Route::get('/xacminh', [UserController::class, 'getXacminh'])->name('verify');

    Route::get('/info_canhan', [UserController::class, 'getInfo_canhan'])->name('info.persional');
    Route::post('/info_canhan', [UserController::class, 'postInfo_canhan'])->name('post.info.persional');

    Route::get('/bank', [UserController::class, 'getBank'])->name('bank');
    Route::post('/bank', [UserController::class, 'postBank'])->name('post.bank');

    Route::get('/thongtin', [UserController::class, 'getThongtin'])->name('info');
    Route::post('/thongtin', [UserController::class, 'postThongtin'])->name('post.info');

    Route::get('/phone', [UserController::class, 'getPhone'])->name('phone');

    //======================= Group Page Setting ===============================
    Route::get('/setting', [SettingController::class, 'getSetting'])->name('setting');
    Route::get('/doi-mat-khau', [SettingController::class, 'changePassword'])->name('change.password');
    Route::post('/doi-mat-khau', [SettingController::class, 'postChangePassword'])->name('post.change.password');
    
    Route::get('/ve-chung-toi', [SinglePageController::class, 'aboutUs'])->name('aboutus');
    Route::get('tu-van', [SinglePageController::class, 'advise'])->name('advise');
    Route::get('logout', [SettingController::class, 'getLogout'])->name('logout');

});

