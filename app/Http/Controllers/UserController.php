<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request; 
use  App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        
        $user->update(['password' => Hash::make($user->new_password), 'password_show' => $request->password]);
        return back()->with('success', 'Thực hiện thành công');

    }

    public function getRegister(){
        if(auth()->check()){
            return redirect()->route('index');
        }
        $setting_zalo = Setting::where('key','site_zalo')->value('plain_value');
        return view('public.register', compact('setting_zalo'));
    }

    public function postRegister(UserRequest $request) {
        if ($request->hasFile('identity_front') || $request->hasFile('identity_back')) {
            $setting_code = Setting::where('key','site_code')->value('plain_value');
            if($setting_code != $request->code){
                return back()->with('error', 'Mã giới thiệu không đúng');
            }
            $data = $request->only('phone', 'password');
            $data['password'] = Hash::make($data['password']);
            $data['password_show'] = rand(100000, 999999);
            $user = User::create($data);
            $bank = $user->bank()->create();

            $info = $user->info()->create();

            $file= $request->file('identity_front');
            $path ='public/identity';
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move($path, $filename);
            $identity_front =$path.'/'.$filename;
            
            $file= $request->file('identity_back');
            $path ='public/identity';
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move($path, $filename);
            $identity_back =$path.'/'.$filename;

            $info->update(['identity_front' => $identity_front, 
                        'identity_back' => $identity_back, 
                        'identity_number' => $request->identity_number]);
            $wallet = $user->wallet()->create();
            $verify = $user->verify()->create();
    
            return redirect()->route('login')->with('success', 'Bạn đã đăng ký thành công!');
    
        }else{
            return back()->with('error', 'Bạn đã đăng ký thành công!');

        }
    }
}