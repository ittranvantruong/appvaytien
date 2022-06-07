<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;
    protected $table = 'user_verify';

    protected $fillable = ['user_id', 'info_personal', 'info_general', 'bank', 'phone'];

    protected $attributes = [
        'info_personal' => 0,
        'info_general' => 0,
        'bank' => 0,
        'phone' => 0,
    ];
}
