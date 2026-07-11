<?php

require __DIR__.'/vendor/autoload.php';

use App\Controller\AuthController;


$controller = new AuthController();

$controller->login();