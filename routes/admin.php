<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\HomeController;
use App\Admin\Http\Controllers\SettingController;
use App\Admin\Http\Controllers\LoanAmountController;
use App\Admin\Http\Controllers\LoanPeriodController;

Route::get('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::post('dang-nhap', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');

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

    Route::get('cai-dat', [SettingController::class, 'index'])->name('setting');
    Route::post('cai-dat', [SettingController::class, 'store'])->name('setting.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});