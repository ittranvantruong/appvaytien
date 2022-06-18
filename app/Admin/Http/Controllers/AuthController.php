<?php

namespace App\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    //
    public function login(){
        if(auth()->guard('admin')->check()){
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }

    public function postLogin(AuthRequest $request){

        if(Auth::guard('admin')->attempt($request->only('name', 'password'))){
            if(session()->has('url-redirect')){
                $url = session()->get('url-redirect');
                session()->forget('url-redirect');
                return redirect($url)->with('success', 'Bạn đã đăng nhập thành công');
            }
            $request->session()->regenerate();

            return redirect()->route('admin.index')->with('success', 'Bạn đã đăng nhập thành công');
        }
        
        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    public function changePassword(Request $request){
        $admin = auth()->guard('admin')->user();
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return back()->with('success', 'Đổi mật khẩu thành công');
        }else{
            return back()->with('error', 'Mật khẩu cũ không đúng');
        }
        
        
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Bạn đã đăng xuất thành công');
    }
}
