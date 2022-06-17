<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawn extends Model
{
    use HasFactory;

    protected $table = 'withdrawn';

    protected $fillable = [
        'user_id',
        'amount', 
        'status',

    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
