<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getCart()
    {
        return $this->order->with('orderItem', 'orderItem.product')->where('status', 1)->first();
    }

    public function create(array $insertData)
    {
        return $this->order->create($insertData);
    }

    public function findByCustomerId(int $customerId, int $status)
    {
        return $this->order->query()->where('customer_id', $customerId)->where('status', $status)->with('orderItem')->first();
    }
}
