<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected readonly ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        dd($this->productService);
        return $this->productService->getAll();
    }

    public function store(Request $request)
    {
        return $this->productService->create($request);
    }

}
