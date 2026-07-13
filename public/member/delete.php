<?php

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Repository\UserRepository;


// 로그인 체크
if (!isset($_SESSION['user'])) {

    header("Location: ../login.php");
    exit;

}


// id 체크
if (!isset($_GET['id'])) {

    header("Location: index.php");
    exit;

}


$id = (int) $_GET['id'];



$userRepository = new UserRepository();


$result = $userRepository->delete($id);



if ($result) {

    header("Location: list.php");
    exit;

}


echo "회원 삭제 실패";