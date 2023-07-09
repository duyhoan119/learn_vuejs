<?php

namespace App\Services;

use App\Repositories\OrderItemRepository;

class OrderItemService
{
    protected $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
      
    }

    public function create(array $insertData)
    {
        return $this->orderItemRepository->create($insertData);
    }

    public function delete(int $id)
    {
        return $this->orderItemRepository->delete($id);
    }
}
