<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'username',
        'main_user_id',
        'email',
        'phone',
        'password',
        'manager_unique_token',
        'fcm_token',
        'check_meal',
    ];

    public function Mymeals(){
        return $this->hasMany('App\Models\AllMeal','user_id','id');
    }

    public function mainUser(){
        return $this->belongsTo(MainUsers::class);
    }
}
