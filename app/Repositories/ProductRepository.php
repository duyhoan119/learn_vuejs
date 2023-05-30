<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;

class ProductRepository
{
    protected $product;
    protected $productImage;

    public function __construct(Product $product, ProductImage $productImage)
    {
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function getAll()
    {
        return $this->product->query()->with(['productVariant','productVariant.prVariantOption'])->get();
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

    public function getImages(int $id)
    {
        return $this->productImage->query()->where('product_id', $id)->get();
    }
}
