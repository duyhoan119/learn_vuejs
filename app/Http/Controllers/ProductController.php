<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getAll();
    }

    public function store(Request $request)
    {
        return $this->productService->create($request);
    }

    public function distroy(int $id)
    {
        if ($this->productService->delete($id)) {
            return $this->index();
        }
        return false;
    }
}
