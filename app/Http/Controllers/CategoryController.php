<?php

namespace App\Http\Controllers;

use App\Services\categoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(categoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->categoryService->getAll();
    }

    public function store(Request $request)
    {
        return $this->categoryService->create($request);
    }

    public function save(int $id, Request $request)
    {
        return $this->categoryService->update($id, $request);
    }

    public function findById(int $id)
    {
        return $this->categoryService->findById($id);
    }

    public function distroy(int $id)
    {
        if ($this->categoryService->delete($id)) {
            return $this->index();
        }
        return false;
    }
}
