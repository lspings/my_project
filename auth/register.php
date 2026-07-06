<?php

header("Content-Type: application/json");
require_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "status" => false,
        "message" => "잘못된 JSON 데이터입니다."
    ]);
    exit;
}

$username = trim($data["username"]);
$email = trim($data["email"]);
$password = password_hash($data["password"], PASSWORD_DEFAULT);

try {

    // 이메일 중복 확인
    $check = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $check->execute([
        ":email" => $email
    ]);

    if ($check->fetch()) {
        echo json_encode([
            "status" => false,
            "message" => "이미 가입된 이메일입니다."
        ]);
        exit;
    }

    // 회원가입
    $sql = "INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":username" => $username,
        ":email" => $email,
        ":password" => $password
    ]);

    echo json_encode([
        "status" => true,
        "message" => "회원가입 성공"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}