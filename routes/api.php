<?php

use App\Controllers\AuthController;
use App\Controllers\OrderController;
use App\Middleware\AuthMiddleware;

$orderController = new OrderController();
$authMiddleware = new AuthMiddleware();

$router->get('/', function() {
    echo 'About Page Contents';
});

$router->post('/login', function() {
    $auth = new AuthController();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $auth->login($username, $password);
    if ($token) {
        echo json_encode(['token' => $token]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Unauthorized']);
    }
});

$router->before('GET', '/orders', function() use ($authMiddleware) {
    $authMiddleware->handle();
});

$router->get('/orders', function(){
    $controller = new OrderController();
    $controller->index();
});

$router->before('GET', '/orders/month/(\d+)', function() use ($authMiddleware) {
    $authMiddleware->handle();
});

$router->get('/orders/month/(\d+)', function($month){
    $controller = new OrderController();
    $controller->orderByMonthCreatedAt($month);
});

$router->before('GET', '/orders/status/(\d+)', function() use ($authMiddleware) {
    $authMiddleware->handle();
});

$router->get('/orders/status/(\d+)', function($status){
    $controller = new OrderController();
    $controller->orderByStatus($status);
});

$router->get('/status', function(){
    $controller = new OrderController();
    $controller->getStatus();
});
$router->get('/months', function(){
    $controller = new OrderController();
    $controller->getMonths();
});