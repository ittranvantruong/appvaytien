<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ExportPDF;
use Illuminate\Http\Request;
use App\Models\UserLoanAmount;

class ContractController extends Controller
{
    use ExportPDF;
    public function showExample(User $user, Request $request){
        $data = $user->info()->first()->only('fullname', 'identity_number');
        return $this->loanContract($data);
    }

    public function show(UserLoanAmount $userLoanAmount, Request $request){
        $data = $userLoanAmount->only('fullname', 'identity_number', 'loan_limit', 'loan_period', 'interest_rate');
        $data['created_at'] = date('d/m/Y', strtotime($userLoanAmount->created_at));
        return $this->loanContract($data);
    }
}
