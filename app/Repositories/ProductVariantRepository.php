<?php

namespace App\Repositories;

use App\Models\PrVariants;

class ProductVariantRepository
{
    protected $ProductVariant;
    
    public function __construct(PrVariants $ProductVariant)
    {
        $this->ProductVariant = $ProductVariant;
    }

    public function getAll()
    {
        return $this->ProductVariant->query();
    }

    public function create(array $insertData)
    {
        return $this->ProductVariant->create($insertData);
    }

    public function update(int $id, array $updateData)
    {
        $ProductVariantUpdate = $this->ProductVariant->find($id);
        if ($ProductVariantUpdate) {
            $ProductVariantUpdate->update($updateData);
            return true;
        } else {
            return false;
        }
    }

    public function findById(int $id)
    {
        return $this->ProductVariant->find($id);
    }

    public function delete(int $id)
    {
        $ProductVariantDelete = $this->ProductVariant->find($id);
        if ($ProductVariantDelete) {
            $ProductVariantDelete->delete();
            return true;
        } else {
            return false;
        }
    }
}