<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAmount extends Model
{
    use HasFactory;
    protected $table = 'user_loan_amount';

    protected $fillable = ['name', 'sort'];
}
