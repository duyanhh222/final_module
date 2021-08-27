<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Use_address extends Model
{
    use HasFactory;
    protected $table = 'use_address';
    protected $fillable = [
        'user_id','address'
    ];
}
