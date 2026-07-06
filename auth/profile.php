<?php

header("Content-Type: application/json");

require_once "../config/jwt.php";
require_once "../vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// 1. Authorization 헤더 가져오기
$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    echo json_encode([
        "status" => false,
        "message" => "토큰이 없습니다."
    ]);
    exit;
}

// 2. Bearer 토큰 분리
$authHeader = $headers['Authorization'];
$token = str_replace("Bearer ", "", $authHeader);

try {

    // 3. 토큰 검증
    $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));

    // 4. 성공 응답
    echo json_encode([
        "status" => true,
        "message" => "인증 성공",
        "user" => $decoded
    ]);

} catch (Exception $e) {

    echo json_encode([
        "status" => false,
        "message" => "토큰이 유효하지 않습니다.",
        "error" => $e->getMessage()
    ]);
}