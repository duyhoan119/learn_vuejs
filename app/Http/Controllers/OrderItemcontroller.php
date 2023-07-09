<?php

namespace App\Http\Controllers;

use App\Services\OrderItemService;
use Illuminate\Http\Request;

class OrderItemcontroller extends Controller
{
    protected $orderItemService;
    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function destroy(int $id)
    {
      return  $this->orderItemService->delete($id);
    }
}
