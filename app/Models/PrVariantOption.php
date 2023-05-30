<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrVariantOption extends Model
{
    use HasFactory;

    public $table = "pr_variant_options";

    protected $fillable = [
        'pr_variant_id',
        'name',
        'sku',
        'price',
        'image'
    ];
}
