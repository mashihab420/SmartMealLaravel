<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainUsers extends Model
{
    use HasFactory;
    protected $table = 'mainusers';
    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
        'admin_unique_token',
        'check_meal',
    ];

    public function Mymeals(){
        return $this->hasMany('App\Models\AllMeal','manager_unique_id','id');
    }
}
