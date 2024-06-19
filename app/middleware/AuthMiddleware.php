<?php

namespace App\Middleware;

use App\Helpers\JwtHelper;

class AuthMiddleware
{
    public function handle()
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        $token = str_replace('Bearer ', '', $token);
        
        if (!JwtHelper::verifyToken($token)) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit;
        }
    }
}
