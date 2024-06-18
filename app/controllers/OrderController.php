<?php

namespace App\Controllers;

use App\Models\Order;

class OrderController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        $orders = $this->orderModel->getAllOrders();
        echo json_encode($orders);
    }
}