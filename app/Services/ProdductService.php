<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;

    public function __construct( ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        $insertData = $request->validate();
        return $this->productRepository->create($insertData);
    }

    public function getAll(){
        return $this->productRepository->getAll();
    }
}
