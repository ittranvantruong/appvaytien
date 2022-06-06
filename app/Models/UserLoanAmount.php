<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoanAmount extends Model
{
    use HasFactory;
    protected $table = 'user_loan_amount';

    protected $fillable = ['code', 'user_id', 'fullname', 'identity_number', 'phone', 'loan_amount', 'loan_period', 'interest_rate', 'loan_limit', 'status'];

    public function repayment(){
        return $this->hasMany(UserLoanRepayment::class, 'user_loan_amount_id', 'id');
    }

    public function withdrawal_progress(){
        return $this->hasMany(UserwithdrawalProgress::class, 'user_loan_amount_id', 'id');
    }
}
