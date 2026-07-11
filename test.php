<?php

require __DIR__.'/vendor/autoload.php';

use App\Service\AuthService;


$auth = new AuthService();


echo $auth->login(
    "hong@test.com",
    "123456"
);