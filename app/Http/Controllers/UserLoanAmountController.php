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
        return view('public.loan_amount.index', compact('user_loan_amount'));
    }
}
