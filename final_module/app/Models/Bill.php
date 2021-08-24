<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'bills';
    protected $fillable = [
        'user_id','phone','restaurant_id','address','name','status','total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'bill_details', 'bill_id', 'food_id')->withPivot('quantity');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
