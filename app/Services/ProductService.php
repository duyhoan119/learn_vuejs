<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function create(Request $request)
    {
        $insertData = $request->all();
        return $this->productRepository->create($insertData);
    }

    public function update(int $id, Request $request)
    {
        $updateData = $request->all();
        return $this->productRepository->update($id, $updateData);
    }

    public function findById(int $id)
    {
        return $this->productRepository->findById($id);
    }

    public function delete(int $id)
    {
        if ($this->productRepository->delete($id)) {
            return true;
        }
        return false;
    }

    public function getImages(int $id)
    {
       return $this->productRepository->getImages($id);
    }
}
