<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function create(array $insertData)
    {
        return $this->product->create($insertData);
    }

    public function update(int $id, array $updateData)
    {
        $productUpdate = $this->product->find($id);
        if ($productUpdate) {
            $productUpdate->update($updateData);
            return true;
        } else {
            return false;
        }
    }

    public function findById(int $id)
    {
        return $this->product->find($id);
    }

    public function delete(int $id)
    {
        $productDelete = $this->product->find($id);
        if ($productDelete) {
            $productDelete->delete();
            return true;
        } else {
            return false;
        }
    }
}
