<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function getProfile() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
            
        return view('public.profile.index', compact(
            'user',
        ));
    }

    //================= Group page xác minh KYC =================
    public function getXacminh() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        return view('public.xacminh.xacminh', compact('user'));
    }

    public function getInfo_canhan() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        return view('public.xacminh.info_canhan', compact('user'));
    }

    public function postInfo_canhan(Request $request) {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        
        $user->email = $request->email;
        $user->save();
        
        $user->info->fullname = $request->fullname;
        $user->info->identity_number = $request->identity_number;
        $user->info->save();

        return redirect()->back();
    }

    public function getThongtin() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();

        return view('public.xacminh.thongtin', compact('user'));
    }

    public function postThongtin(Request $request) {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();

        $user->info->education = $request->education;
        $user->info->personal_income = $request->personal_income;
        $user->info->purpose = $request->purpose;
        $user->info->private_apartment = $request->private_apartment;
        $user->info->private_car = $request->private_car;
        $user->info->save();

        return redirect()->back();
    }

    public function getBank() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        return view('public.xacminh.bank', compact('user'));
    }

    public function postBank(Request $request) {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();

        $bank = $user->bank;
        $bank->name_owner = $request->name_owner;
        $bank->name = $request->name;
        $bank->identity_number = $request->identity_number;
        $bank->number = $request->number;
        $bank->save();

        return redirect()->back();
    }

    public function getPhone() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        return view('public.xacminh.phone', compact('user'));
    }
}