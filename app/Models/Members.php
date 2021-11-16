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
        'email',
        'phone',
        'password',
        'manager_unique_token',
        'check_meal',
    ];

    public function Mymeals(){
        return $this->hasMany('App\Models\AllMeal','user_id','id');
    }
}
