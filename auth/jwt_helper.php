<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

const JWT_SECRET = "8f2c6d9a4b1e7f0c5a3d8e9f2b6c1a7d4e5f8b9c2a1d6e7f0b3c5d8a9e1f2c4";

function createJWT($userId, $username)
{
    $payload = [
        "user_id" => $userId,
        "username" => $username,
        "iat" => time(),
        "exp" => time() + (60 * 60 * 24) // 24시간
    ];

    return JWT::encode($payload, JWT_SECRET, 'HS256');
}

function verifyJWT($token)
{
    return JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
}