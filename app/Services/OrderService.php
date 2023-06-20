<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderService
{
    protected $orderRepository;
    protected $orderItemService;

    public function __construct(OrderRepository $orderRepository, OrderItemService $orderItemService)
    {
        $this->orderRepository = $orderRepository;
        $this->orderItemService = $orderItemService;
    }

    public function getCart()
    {
        return $this->orderRepository->getCart();
    }

    public function create(Request $request)
    {
        $customerId = 1;

        $data = $request->all();
        $insertOrderData = [
            "customer_id" => $customerId,
            "status" => 1
        ];
        $insertOrderItemData =
            [
                "content" => "",
                "sku" => $data['sku'],
                "price" => $data['price'],
                "discount" => $data['discount'],
                "quantity" => 1,
                "product_id" => $data['id'],
                "product_variant" => json_encode($data['product_variant']),
            ];
        $order = $this->orderRepository->findByCustomerId($customerId, 1);
        if ($order) {
            $insertOrderItemData["order_id"] = $order->id;
        } else {
            $order = $this->orderRepository->create($insertOrderData);
            $insertOrderItemData["order_id"] = $order->id;
        }

        foreach ($order->orderItem as $orderItem) {
            if ($orderItem->product_id === $insertOrderItemData['product_id']) {
                $orderItem->quantity += $insertOrderItemData['quantity'];
                return $orderItem->save();
            } else {
                return $this->orderItemService->create($insertOrderItemData);
            }
        }
    }
}
