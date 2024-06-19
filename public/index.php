<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Bramus\Router\Router;
use App\Helpers\JwtHelper;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

JwtHelper::init();

$router = new Router();

require __DIR__ . '/../routes/api.php';

$router->run();