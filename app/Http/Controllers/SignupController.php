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

        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required',
        ], $error);

        if (Auth::attempt($request->only('phone', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }

    public function postRegister(Request $request) {
        
        $error = [
            'phone.required' => 'Bạn chưa nhập số điện thoại!',
            'phone.unique' => 'Số điện thoại đã có người đăng ký !',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
        ];
        $this->validate($request, [
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone'],
            'password' => 'required',
        ], $error);
        $data = $request->only('phone', 'password');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $bank = $user->bank()->create();
        $info = $user->info()->create();
        $wallet = $user->wallet()->create();
        $verify = $user->verify()->create();

        return back()->with('success', 'Bạn đã đăng ký thành công!');
    }
}