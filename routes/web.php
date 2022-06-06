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
Route::view('/', 'public.index');
Route::view('login', 'public.login');
Route::view('wallet', 'public.wallet.index');
Route::view('profile', 'public.profile.index');
Route::view('advise', 'public.advise.index');
Route::view('setting', 'public.setting.index');
