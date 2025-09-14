<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'person_name',
        'address',
        'whatsapp_number',
        'number',
        'item_amount',
        'order_type',
        'order_name',
        'alternative_requested',
        'alternative_item_title',
        'item_specifications',
        'notes',
        'cart_images',
        'is_published',
        'is_rejected',
        'is_featured'
    ];
    protected $casts = [
        'cart_images' => 'array',
    ];
        public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //...
public function images()
{
    return $this->hasMany(OrderImage::class);
}
//...
}
