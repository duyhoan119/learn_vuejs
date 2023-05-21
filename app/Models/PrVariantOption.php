<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrVariantOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'pr_variant_id',
        'name',
        'sku',
        'price',
        'image'
    ];
}
