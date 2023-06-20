<?php

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository
{
    
    protected $orderItem;
    
    public function __construct(OrderItem $orderItem,)
    {
        $this->orderItem = $orderItem;
      
    }

    public function create(array $insertData)
    {
        return $this->orderItem->create($insertData);
    }

    public function update(int $id, array $updateData)
    {
        $orderItemUpdate = $this->orderItem->find($id);
        if ($orderItemUpdate) {
            $orderItemUpdate->update($updateData);
            return true;
        } else {
            return false;
        }
    }

    public function findByCustomerId(int $id)
    {
        return $this->orderItem->find($id);
    }

    public function delete(int $id)
    {
        $orderItemDelete = $this->orderItem->find($id);
        if ($orderItemDelete) {
            $orderItemDelete->delete();
            return true;
        } else {
            return false;
        }
    }
}
