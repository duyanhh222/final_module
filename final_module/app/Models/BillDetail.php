<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
}
