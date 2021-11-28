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
        return $this->hasMany(AllMeal::class,'manager_unique_id','id');
    }

    public function members(){
        return $this->hasMany(Members::class,'main_user_id','id');
    }
    public function memberDeposit(){
        return $this->hasMany(Deposit::class,'main_user_id','id');
    }

    public function mealExpense(){
        return $this->hasMany(Expense::class,'main_user_id','id');
    }

}
