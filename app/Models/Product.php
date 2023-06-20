<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'slug',
        'name',
        'user_id',
        'price',
        'discount',
        'type',
        'sku',
    ];

    public function productVariant()
    {
        return $this->hasMany(PrVariant::class);
    }
}
