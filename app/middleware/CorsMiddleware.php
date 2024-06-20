<?php

namespace App\Middleware;

class CorsMiddleware
{
    public function handle()
    {
        // Configurar cabeceras CORS
        header('Access-Control-Allow-Origin: *'); // Cambia '*' por el dominio específico si es necesario
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        // Permitir métodos OPTIONS
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(204);
            exit();
        }
    }
}
