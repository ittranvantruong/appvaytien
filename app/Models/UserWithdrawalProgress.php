<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawalProgress extends Model
{
    use HasFactory;
    protected $table = 'user_withdrawal_progress';

    protected $fillable = ['user_loan_amount_id', 'amount', 'status', 'note'];
}
