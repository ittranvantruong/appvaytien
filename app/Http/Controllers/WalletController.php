<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class WalletController extends Controller
{
    public function index() {
        $user = auth()->user()->load('wallet:user_id,amount', 'bank');
            
        return view('public.wallet.index', compact('user'));
    }

}