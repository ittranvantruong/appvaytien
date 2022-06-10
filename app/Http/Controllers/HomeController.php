<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\LoanAmount;
use App\Models\Loanperiod;
use App\Models\UserLoanAmount;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        $loan_name = LoanAmount::orderBy('sort')->get();
        $loan_day = LoanPeriod::orderBy('sort')->get();
        return view('public.index', compact(
            'user',
            'loan_name',
            'loan_day',
        ));
    }

    public function postLoan(Request $request) {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
        
        if ( $request->loan_amount == null || $request->loan_period == null ) {
            return back()->with('errorModal', 'Nhập thiếu info vay');
        }
        $user_loan_amount = new UserLoanAmount;
        $user_loan_amount->loan_amount = $request->loan_amount;
        $user_loan_amount->loan_period = $request->loan_period;
        $user_loan_amount->interest_rate = $request->interest_rate;
        $user_loan_amount->user_id = auth()->user()->id;
        $user_loan_amount->fullname = $user->info->fullname;
        $user_loan_amount->identity_number = $user->info->identity_number;
        $user_loan_amount->phone = $user->phone;
        $user_loan_amount->save();

        return back()->with('successModal', 'Đăng ký vay thành công');
    }
}