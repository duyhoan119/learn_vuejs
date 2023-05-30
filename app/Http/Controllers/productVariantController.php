<?php

namespace App\Http\Controllers;

use App\Services\ProductVariantService;

class ProductVariantController extends Controller
{
    protected $productVariantService;

    public function __construct(ProductVariantService $productVariantService)
    {
        $this->productVariantService = $productVariantService;
    }

    public function findByProductId(int $id)
    {
        return $this->productVariantService->findByProductId($id);
    }
}
