<?php

use App\Controllers\OrderController;

$orderController = new OrderController();

$router->get('/', function() {
    echo 'About Page Contents';
});
$router->get('/orders', 'OrderController@getOrders');
