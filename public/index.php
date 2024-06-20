<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Bramus\Router\Router;
use App\Helpers\JwtHelper;
use App\Middleware\CorsMiddleware;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Middleware CORS
$corsMiddleware = new CorsMiddleware();
$corsMiddleware->handle();

JwtHelper::init();

$router = new Router();

require __DIR__ . '/../routes/api.php';

$router->run();