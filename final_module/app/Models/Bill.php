<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $able = 'bills';
    protected $fillable = [
        'user_id','phone','address','name','status','total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
