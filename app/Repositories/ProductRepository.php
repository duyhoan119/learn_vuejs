<?php

namespace App\Repositories;

use  App\Models\Product;

class ProductRepository
{
    protected $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create(array $values)
    {
        return $this->product->query()->create($values);
    }

    public function getAll()
    {
        return $this->product->all();
    }
}
