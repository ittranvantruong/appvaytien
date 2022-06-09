<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Userbank;
use App\Models\UserInfo;
use App\Models\UserVerify;
use App\Models\Wallet;

class SignupController extends Controller
{
    public function getLogin() {
        return view('public.login');
    }

    public function postLogin(Request $request) {
        $error = [
            'phone.required' => 'Chưa nhập số điện thoại đăng nhập!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
        ];

        $info = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ], $error);

        if (Auth::attempt($info)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }

    public function postRegister(Request $request) {
        $error = [
            'phone.required' => 'Mời nhập phone!',
            'phone.unique' => 'Số phone bị trùng!',
            'phone.digits_between' => 'Số điện thoại đăng ký không hợp lệ!',
            'password.required' => 'Mời nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 chữ số!'
        ];

        $request->validate([
            'phone' => 'digits_between:7,11|unique:users|required',
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

        $verified = new UserVerify;
        $verified->user_id = $user->id;
        $verified->save();

        return back()->with('mess', 'Chúc mừng!');
    }
}