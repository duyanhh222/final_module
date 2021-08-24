<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table='restaurants';
    protected $fillable=[
        'name','address','time_open','time_close','service','phone','explain'
    ];


    public function food()
    {
        return $this->hasMany(Food::class, 'id');
    }
    public function bill()
    {
        return $this->hasMany(Bill::class, 'id');
    }
}
