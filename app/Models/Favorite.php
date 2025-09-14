<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
