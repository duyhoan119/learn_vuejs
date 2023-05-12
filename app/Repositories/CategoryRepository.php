<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function create(array $insertData)
    {
        return $this->category->create($insertData);
    }

    public function update(int $id, array $updateData)
    {
        $categoryUpdate = $this->category->find($id);
        if ($categoryUpdate) {
            $categoryUpdate->update($updateData);
            return true;
        } else {
            return false;
        }
    }

    public function findById(int $id)
    {
        return $this->category->find($id);
    }

    public function delete(int $id)
    {
        $categoryDelete = $this->category->find($id);
        if ($categoryDelete) {
            $categoryDelete->delete();
            return true;
        } else {
            return false;
        }
    }
}
