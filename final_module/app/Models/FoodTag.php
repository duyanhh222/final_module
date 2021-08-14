<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodTag extends Model
{
    use HasFactory;
    protected $table='food_tags';
    protected $fillable=[
        'food_id','tag_id'
    ];
}
