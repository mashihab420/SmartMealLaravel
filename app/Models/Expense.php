<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $fillable = [
        'manager_unique_id',
        'user_id',
        'grocery_cost',
        'other_cost',
        'description',
        'date'
    ];
}
