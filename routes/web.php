<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserLoanAmountController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\ProfileController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/test-pdf', [AuthController::class, 'testPDF']);
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::post('/register', [UserController::class, 'postRegister'])->name('post.register');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');
    
    //======================= use Loan amount  ===========================
    Route::group(['as' => 'user.loan.amount.'], function () {
        Route::get('/khoan-vay-cua-toi', [UserLoanAmountController::class, 'index'])->name('index');
        Route::post('/dang-y-khoan-vay', [UserLoanAmountController::class, 'store'])->name('store');

    });
    
    // =======================
    Route::group(['prefix' => '/vi', 'as' => 'wallet.'], function () {

        Route::get('/', [WalletController::class, 'index'])->name('index');
    });
    
    // =======================
    Route::group(['prefix' => '/ho-so', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');

        Route::get('/xac-minh-thong-tin', [ProfileController::class, 'verify'])->name('verify');
        Route::get('/thong-tin-ca-nhan', [ProfileController::class, 'infoPersional'])->name('info.persional');
        Route::put('/thong-tin-ca-nhan', [ProfileController::class, 'UpdateInfoPersional'])->name('update.info.persional');
        Route::get('/thong-tin', [ProfileController::class, 'Info'])->name('info');
        Route::put('/thong-tin', [ProfileController::class, 'updateInfo'])->name('update.info');
        Route::get('/the-ngan-hang', [ProfileController::class, 'cardBank'])->name('card.bank');
        Route::put('/the-ngan-hang', [ProfileController::class, 'updateCardBank'])->name('update.card.bank');
        Route::get('/phone', [ProfileController::class, 'phone'])->name('phone');
    });
    // =======================
    
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');

    Route::get('/doi-mat-khau', [UserController::class, 'changePassword'])->name('user.change.password');
    Route::put('/doi-mat-khau', [UserController::class, 'updateChangePassword'])->name('update.change.password');

    
    // ============= single page =====================
    Route::get('/tu-van', [SinglePageController::class, 'advise'])->name('single.page.advise');
    Route::get('/ve-chung-toi', [SinglePageController::class, 'aboutUs'])->name('single.page.aboutus');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

