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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'verified',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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

    public function verified(){
        return $this->verify()->update([
            'info_personal' => 1, 
            'info_general' => 1, 
            'bank' => 1, 
            'phone' => 1
        ]);
    }

    public function checkVerified(){
        $get = $this->verify;
        return $get->info_personal && $get->info_general && $get->bank && $get->phone;
    }

    public function loan_amount(){
        return $this->hasMany(UserLoanAmount::class, 'user_id', 'id');
    }

}
