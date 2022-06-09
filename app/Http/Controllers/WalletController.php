<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class WalletController extends Controller
{
    public function getWallet() {
        $user = User::where('id', auth()->user()->id)
            ->with('wallet', 'bank', 'info', 'verify', 'loan_amount')
            ->first();
            
        return view('public.wallet.index', compact(
            'user'
        ));
    }

}