<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignupController extends Controller
{
    public function getLogin() {
        return view('public.login');
    }

    public function postLogin(Request $request) {
        $error = [
            'phone.required' => 'Mời nhập phone!',
            'password.required' => 'Mời nhập mật khẩu!',
        ];

        $info = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ], $error);

        if (Auth::attempt($info)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('mess', 'Tài khoản hoặc mật khẩu không đúng!',);
    }
}