<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table='foods';
    protected $fillable=[
        'name','category_id','restaurant_id','price','price_discount','image','description','status','on_sale',
        'user_id','coupon','count_coupon','time_preparation'
    ];
}
