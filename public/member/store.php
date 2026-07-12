<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../../vendor/autoload.php";

use App\Controller\UserController;
use App\Exception\ValidationException;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: create.php");
    exit;
}

$userController = new UserController();

try {

    $userController->create($_POST);

    header("Location: list.php");
    exit;

} catch (ValidationException $e) {

    $_SESSION['old'] = [
        'username' => $_POST['username'] ?? '',
        'email'    => $_POST['email'] ?? ''
    ];

    $_SESSION['errors'] = $e->getErrors();

    header("Location: create.php");
    exit;

} catch (Exception $e) {

    die($e->getMessage());

}