<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawn;

class WithdrawnController extends Controller
{
    public function index(){
        $user = auth()->user()
        ->load('wallet:user_id,amount','info:user_id,fullname');
    
   
        return view('public.withdrawn.index', compact('user'));
    }
    
    public function postWithdrawn(Request $request){
        $user = auth()->user()
        ->load('wallet:user_id,amount','info:user_id,fullname');
        if($request->amount > $user->wallet->amount || $request->amount <= 0){
            return back()->with('error', 'Nhập số tiền rút phải lớn hơn 0, bé hơn số dư hiện tại');
        }
        if($user->password_show == $request->password_show) {
            $data = $request->only('amount');
            $data['user_id'] = $user->id;
            Withdrawn::create($data);
            $user->password_show =  rand(100000, 999999);
            $user->save();
            return back()->with('success', 'Đã đặt lệnh rút thành công, vui lòng đợi duyệt');

        }else{
            return back()->with('error', 'Mật khẩu rút tiền không đúng');

        }
    
    }

    public function show(){
        $user = auth()->user()
        ->load('withdrawns');
        return view('public.withdrawn.show', compact('user'));
    }
}
