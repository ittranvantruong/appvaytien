<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use  App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function changePassword() {
        return view('public.user.changePassword');
    }

    public function updateChangePassword(UserRequest $request){
        $user = auth()->user();

        if(!Hash::check($request->password, $user->password)){
            return back()->with('error', 'Mật khẩu cũ không chính xác');
        }
        
        $user->update(['password' => Hash::make($user->new_password)]);
        return back()->with('success', 'Thực hiện thành công');

    }

    public function postRegister(UserRequest $request) {
        
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