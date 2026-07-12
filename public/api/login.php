<?php

require_once __DIR__ . '/../../vendor/autoload.php';


use App\Controller\AuthController;


header('Content-Type: application/json; charset=utf-8');


$controller = new AuthController();


$controller->login();