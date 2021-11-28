<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $table = 'deposit';
    protected $fillable = [
        'manager_unique_id',
        'user_id',
        'member_deposit',
        'date'
    ];
}
