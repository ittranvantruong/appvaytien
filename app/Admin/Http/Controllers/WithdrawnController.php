<?php

namespace App\Admin\Http\Controllers;

use App\Models\Withdrawn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawnController extends Controller
{
    public function index(Request $request){
        $withdrawns = Withdrawn::with('user');
        if($request->filled('status')){
            $status = $request->status;
            $withdrawns = $withdrawns->whereStatus($status);
        }
        $withdrawns = $withdrawns->orderBy('id', 'desc')->get();
        return view('admin.withdrawn.index', compact('withdrawns'));
    }

    public function edit(Withdrawn $withdrawn){
        $withdrawn = $withdrawn->load(['user' => function ($query){
            $query->select('id', 'phone');
            $query->with(['info', 'bank','wallet']);
        }]);
        return view('admin.withdrawn.edit', compact('withdrawn'));
    }
    public function process(Request $request){
        $withdrawn = Withdrawn::whereId($request->id)->first();
        if($withdrawn->status == 0){
            $withdrawn->status = $request->status;
            $withdrawn->save();
            if($request->status == 1){
                $user = $withdrawn->user()->first();
                $wallet = $user->wallet()->first();;
    
                if($withdrawn->amount > $wallet->amount){
                    return back()->with('error', 'Số dư khách hàng khôngg đủ');
    
                }else{
                    $wallet->amount = $wallet->amount-$withdrawn->amount;
                    $wallet->save();
                }
                       
            }else{
                $withdrawn->note = $request->note;
                $withdrawn->save();
            }
            return back()->with('success', 'Duyệt thành công');
        }else{
            return back()->with('error', 'Lệnh rút đã được duyệt');

        }
  
    }
}
