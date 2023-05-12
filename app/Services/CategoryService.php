<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class categoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function create(Request $request)
    {
        $insertData = $request->all();
        return $this->categoryRepository->create($insertData);
    }

    public function update(int $id, Request $request)
    {
        $updateData = $request->all();
        return $this->categoryRepository->update($id, $updateData);
    }

    public function findById(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function delete(int $id)
    {
        if ($this->categoryRepository->delete($id)) {
            return true;
        }
        return false;
    }
}
