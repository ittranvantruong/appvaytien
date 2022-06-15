<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLoanAmount;

class UserLoanAmountController extends Controller
{
    //
    public function index(){
        $user_loan_amount = UserLoanAmount::select('id', 'code', 'loan_amount', 'loan_period', 'interest_rate', 'loan_limit', 'status', 'created_at')
        ->where('user_id', auth()->user()->id)
        ->orderBy('id', 'DESC')
        ->get();
        // dd($user_loan_amount);
        return view('public.loan_amount.index', compact('user_loan_amount'));
    }

    public function store(Request $request) {
        $user = auth()->user()
        ->load('info:user_id,fullname,identity_number');

        if ( $user->verified !=1 ) {
            return back()->with('error', 'Không đủ điểu kiện để đăng ký');
        }

        $data = $request->only('loan_amount', 'loan_period', 'interest_rate');
        $data['code'] = config('custom.code_user_loan_amount').time();
        $data['fullname'] = $user->info->fullname;
        $data['identity_number'] = $user->info->identity_number;
        $data['phone'] = $user->phone;

        $user->loan_amount()->create($data);

        return back()->with('successModal', 'Đăng ký vay thành công');
    }
}
