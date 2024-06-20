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

    public function orderByMonthCreatedAt($month)
    {
        $orders = $this->orderModel->getAllOrders();
        if ($month != 0) {
            $orders = $this->orderModel->getOrdersByMonthCreated($month);
        }
        echo json_encode($orders);
    }

    public function orderByStatus($status)
    {
        $orders = $this->orderModel->getOrdersByStatus($status);
        echo json_encode($orders);
    }

    public function getStatus()
    {
        $status = $this->orderModel->getStatusLists();
        echo json_encode($status);
    }

    public function getMonths()
    {
        $months = $this->orderModel->getMonths();
        echo json_encode($months);
    }
}