<?php

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Repository\UserRepository;


// 로그인 체크
if (!isset($_SESSION['user'])) {

    header("Location: ../login.php");
    exit;

}


// POST 체크
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: index.php");
    exit;

}


$id = (int) $_POST['id'];


$data = [
    'username' => trim($_POST['username']),
    'email' => trim($_POST['email'])
];


// 입력값 체크
if ($data['username'] === '' || $data['email'] === '') {

    echo "필수값을 입력해주세요.";
    exit;

}


$userRepository = new UserRepository();


$result = $userRepository->update($id, $data);



if ($result) {

    header("Location: list.php");
    exit;

}


echo "회원 수정 실패";