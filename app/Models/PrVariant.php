<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrVariant extends Model
{
    use HasFactory;

    public $table = "pr_variants";

    protected $fillable = [
        'name',
        'product_id'
    ];

    public function prVariantOption(){
        return $this->hasMany(PrVariantOption::class);
    }
}
