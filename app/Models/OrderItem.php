<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'content',
        'sku',
        'price',
        'discount',
        'quantity',
        'order_id',
        'product_id',
        'product_variant',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
