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
        'admin_unique_token',
        'check_meal',
    ];
}
