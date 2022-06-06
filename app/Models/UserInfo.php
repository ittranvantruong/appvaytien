<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';

    protected $fillable = ['user_id', 'fullname', 'identity_number', 'education', 'personal_income', 'purpose', 'private_apartment', 'private_car'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select('phone');
    }
}
