<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'bill_details', 'bill_id', 'food_id')->withPivot('quantity');
    }
}
