<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrVariants extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id'
    ];

    public function prVariantOption(){
        return $this->hasMany(PrVariantOptions::class);
    }
}
