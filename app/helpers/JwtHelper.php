<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper
{
    private static $secretKey;

    public static function init()
    {
        if (!isset($_ENV['SECRET_KEY'])) {
            throw new \Exception('SECRET_KEY no está definido en el archivo .env');
        }
        self::$secretKey = $_ENV['SECRET_KEY'];
    }

    public static function generateToken($payload)
    {
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600; // Tiempo de expiración de 1 hora
        $payload['iat'] = $issuedAt;
        $payload['exp'] = $expirationTime;

        return JWT::encode($payload, self::$secretKey, 'HS256');
    }

    public static function verifyToken($token)
    {
        try {
            JWT::decode($token, new Key(self::$secretKey, 'HS256'));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
