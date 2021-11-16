<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllMeal extends Model
{
    use HasFactory;
    protected $table = 'all_meal';
    protected $fillable = [
        'manager_unique_id',
        'user_id',
        'breakfast',
        'lunch',
        'dinner',
        'date'
    ];

}
