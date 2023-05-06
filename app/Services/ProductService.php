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

    public function delete(int $id)
    {
        if ($this->productRepository->delete($id)) {
            return true;
        }
        return false;
    }
}
