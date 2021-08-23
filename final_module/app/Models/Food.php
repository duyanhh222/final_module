<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table='foods';
    protected $primaryKey = 'id';
    protected $fillable=[
        'name','category_id','restaurant_id','price','price_discount','image','description','status','on_sale',
        'user_id','coupon','count_coupon','time_preparation'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'food_tags', 'food_id', 'tag_id');
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class, 'bill_details', 'food_id', 'bill_id');
    }
}
