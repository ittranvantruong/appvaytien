<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\LoanAmount;
use App\Models\LoanPeriod;
use App\Models\UserLoanAmount;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        // auth()->logout();
        $user = auth()->user()->load('info:user_id,fullname,identity_number');

        $loan_amount = LoanAmount::select('id', 'name')->orderBy('sort')->get();
        $loan_period = LoanPeriod::select('id', 'name', 'interest_rate')->orderBy('sort')->get();

        return view('public.index', compact('user', 'loan_amount', 'loan_period'));

    }
}