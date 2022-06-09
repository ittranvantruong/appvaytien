<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Userbank;
use App\Models\UserInfo;
use App\Models\Wallet;

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

    public function postRegister(Request $request) {
        $error = [
            'phone.required' => 'Mời nhập phone!',
            'password.required' => 'Mời nhập mật khẩu!',
        ];

        $request->validate([
            'phone' => 'digits_between:7,11',
            'password' => 'required|min:6',
        ], $error);

        $user = new User();
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        $bank = new Userbank;
        $bank->user_id = $user->id;
        $bank->save();

        $user_info = new UserInfo;
        $user_info->user_id = $user->id;
        $user_info->save();

        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->save();

        return back()->with('mess', 'Không hợp lệ!',);
    }
}