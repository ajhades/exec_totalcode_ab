<?php

namespace App\Controllers;

use App\Helpers\JwtHelper;

class AuthController
{
    public function login($username, $password)
    {
        if ($username === 'admin' && $password === 'password') {
            $payload = array(
                'username' => $username,
            );
            $token = JwtHelper::generateToken($payload);
            return $token;
        } else {
            return false;
        }
    }
}
