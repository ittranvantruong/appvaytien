<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $table = 'user_bank';

    protected $fillable = ['user_id', 'name_owner', 'identity_number', 'name', 'number'];
}
