<?php

use App\Controllers\OrderController;

$orderController = new OrderController();

$router->get('/', function() {
    echo 'About Page Contents';
});

$router->get('/orders', function(){
    $controller = new OrderController();
    $controller->index();
});

$router->get('/orders/month/(\d+)', function($month){
    $controller = new OrderController();
    $controller->orderByMonthCreatedAt($month);
});

$router->get('/orders/status/(\d+)', function($status){
    $controller = new OrderController();
    $controller->orderByStatus($status);
});