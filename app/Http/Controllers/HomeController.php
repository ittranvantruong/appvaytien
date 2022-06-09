<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\LoanAmount;
use App\Models\Loanperiod;

class HomeController extends Controller
{
    public function index() {
        $loan_name = LoanAmount::orderBy('sort')->get();
        $loan_day = LoanPeriod::orderBy('sort')->get();
        return view('public.index', compact(
            'loan_name',
            'loan_day',
        ));
    }

}