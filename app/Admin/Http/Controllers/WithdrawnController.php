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
    public function process(Withdrawn $withdrawn, Request $request){
        $withdrawn->status = $request->status;
        $withdrawn->save();
        if($request->status == 1){
            $user = $withdrawn->user()->first();
            $wallet = $user->wallet()->first();;
            $wallet->amount = $wallet->amount-$withdrawn->amount;
            $wallet->save();
        }
        return back()->with('success', 'Duyệt thành công');
    }
}
