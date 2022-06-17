<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\HomeController;
use App\Admin\Http\Controllers\UserController;
use App\Admin\Http\Controllers\SettingController;
use App\Admin\Http\Controllers\WithdrawnController;
use App\Admin\Http\Controllers\LoanAmountController;
use App\Admin\Http\Controllers\LoanPeriodController;
use App\Admin\Http\Controllers\UserLoanAmountController;

Route::get('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::post('dang-nhap', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
    Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('auth.changePassword');
    Route::group(['prefix' => 'quan-ly-khoan-vay', 'as' => 'loan.amount.'], function () {
        Route::get('/', [LoanAmountController::class, 'index'])->name('index');
        Route::get('edit{loan_amount:id}', [LoanAmountController::class, 'edit'])->name('edit');
        Route::post('store', [LoanAmountController::class, 'store'])->name('store');
        Route::put('update', [LoanAmountController::class, 'update'])->name('update');
        Route::delete('delete/{loan_amount:id}', [LoanAmountController::class, 'delete'])->name('delete');
        Route::post('multiple', [LoanAmountController::class, 'multiple'])->name('multiple');
    });

    Route::group(['prefix' => 'quan-ly-thoi-gian-vay', 'as' => 'loan.period.'], function () {
        Route::get('/', [LoanPeriodController::class, 'index'])->name('index');
        Route::get('edit{loan_period:id}', [LoanPeriodController::class, 'edit'])->name('edit');
        Route::post('store', [LoanPeriodController::class, 'store'])->name('store');
        Route::put('update', [LoanPeriodController::class, 'update'])->name('update');
        Route::delete('delete/{loan_period:id}', [LoanPeriodController::class, 'delete'])->name('delete');
        Route::post('multiple', [LoanPeriodController::class, 'multiple'])->name('multiple');
    });

    Route::group(['prefix' => 'quan-ly-goi-vay-thanh-vien', 'as' => 'user.loan.amount.'], function () {
        Route::get('/', [UserLoanAmountController::class, 'index'])->name('index');
        // Route::get('create', [UserController::class, 'create'])->name('create');
        Route::get('edit/{user_loan_amount:id}', [UserLoanAmountController::class, 'edit'])->name('edit');
        // Route::post('store', [UserController::class, 'store'])->name('store');
        Route::put('update/{user_loan_amount:id}', [UserLoanAmountController::class, 'update'])->name('update');
        Route::put('update-loan-limit/{user_loan_amount:id}', [UserLoanAmountController::class, 'updateLoanLimit'])->name('updateLoanLimit');
        Route::get('xuat-hop-dong/{user_loan_amount:id}', [UserLoanAmountController::class, 'exportContract'])->name('exportPdf');

        // Route::put('verify/{user:id}', [UserController::class, 'verify'])->name('verify');
        Route::delete('delete/{user_loan_amount:id}', [UserLoanAmountController::class, 'delete'])->name('delete');
        // Route::post('multiple', [LoanPeriodController::class, 'multiple'])->name('multiple');
    });

    Route::group(['prefix' => 'quan-ly-lenh-rut', 'as' => 'withdrawn.'], function () {
        Route::get('/', [WithdrawnController::class, 'index'])->name('index');
        Route::get('edit/{withdrawn:id}', [WithdrawnController::class, 'edit'])->name('edit');
        Route::get('process/{withdrawn:id}', [WithdrawnController::class, 'process'])->name('process');

      
    });

    Route::group(['prefix' => 'quan-ly-thanh-vien', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::get('edit/{user:id}', [UserController::class, 'edit'])->name('edit');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::put('update', [UserController::class, 'update'])->name('update');
        Route::put('verify/{user:id}', [UserController::class, 'verify'])->name('verify');
        Route::delete('delete/{user:id}', [UserController::class, 'delete'])->name('delete');
        // Route::post('multiple', [LoanPeriodController::class, 'multiple'])->name('multiple');
    });

    Route::get('cai-dat', [SettingController::class, 'index'])->name('setting');
    Route::post('cai-dat', [SettingController::class, 'store'])->name('setting.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});