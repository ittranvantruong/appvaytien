<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index() {
        if(auth()->check()){
            return redirect()->route('index');
        }
        return view('public.login');
    }

    public function postLogin(AuthRequest $request) {

        if (Auth::attempt($request->only('phone', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }

        return back()->with('error', 'Tài khoản hoặc mật khẩu không đùng');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}