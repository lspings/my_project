<?php

require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

echo "www-2"; 

$key = str_repeat("a", 64);

$payload = [
    "user_id" => 1,
    "name" => "test",
    "iat" => time(),
    "exp" => time() + 3600
];

$jwt = JWT::encode($payload, $key, 'HS256');

echo "<h3>생성된 JWT</h3>";
echo $jwt;

echo "<hr>";

$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

echo "<pre>";
print_r($decoded);
echo "</pre>";