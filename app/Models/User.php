<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'phone',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallet(){
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }
    
    public function bank(){
        return $this->hasOne(Userbank::class, 'user_id', 'id');
    }

    public function info(){
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    public function verify(){
        return $this->hasOne(UserVerify::class, 'user_id', 'id');
    }

    public function loan_amount(){
        return $this->hasMany(UserLoanAmount::class, 'user_id', 'id');
    }

}
