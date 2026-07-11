<?php

session_start();


if (!isset($_SESSION['user'])) {

    echo "로그인이 필요합니다";
    exit;

}


echo "환영합니다 ";
echo $_SESSION['user']['email'];