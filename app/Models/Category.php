<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'is_published',
        'images',
    ];
        public function orders()
    {
        return $this->hasMany(Order::class);
    }
    use HasFactory;
}
