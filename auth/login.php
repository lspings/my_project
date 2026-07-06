<?php

header("Content-Type: application/json");

require_once "../config/database.php";
require_once "../config/jwt.php";
require_once "../vendor/autoload.php";

use Firebase\JWT\JWT;

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "status" => false,
        "message" => "잘못된 요청입니다222."
    ]);
    exit;
}

$email = trim($data["email"]);
$password = $data["password"];

try {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([
        ":email" => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode([
            "status" => false,
            "message" => "이메일 또는 비밀번호가 올바르지 않습니다."
        ]);
        exit;
    }

    if (!password_verify($password, $user["password"])) {
        echo json_encode([
            "status" => false,
            "message" => "이메일 또는 비밀번호가 올바르지 않습니다."
        ]);
        exit;
    }

    $payload = [
        "iss" => JWT_ISSUER,
        "iat" => time(),
        "exp" => time() + JWT_EXPIRE,
        "user_id" => $user["id"],
        "username" => $user["username"],
        "email" => $user["email"]
    ];

    $token = JWT::encode($payload, JWT_SECRET, "HS256");

    echo json_encode([
        "status" => true,
        "message" => "로그인 성공",
        "token" => $token,
        "user" => [
            "id" => $user["id"],
            "username" => $user["username"],
            "email" => $user["email"]
        ]
    ]);

} catch (Exception $e) {

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}