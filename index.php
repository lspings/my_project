\<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    background:#f3f5fa;

}

.header{

    height:70px;
    background:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 40px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);

}

.logo{

    font-size:22px;
    font-weight:bold;
    color:#4f8ef7;

}

.user{

    display:flex;
    align-items:center;
    gap:15px;

}

.logout{

    background:#ef4444;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    transition:.3s;

}

.logout:hover{

    background:#dc2626;

}

.container{

    max-width:1100px;
    margin:50px auto;

}

.card{

    background:white;
    border-radius:16px;
    padding:40px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

h1{

    margin-bottom:15px;
    color:#333;

}

p{

    color:#666;
    line-height:1.8;

}

.grid{

    margin-top:40px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;

}

.box{

    background:#4f8ef7;
    color:white;
    border-radius:14px;
    padding:25px;
    transition:.3s;

}

.box:hover{

    transform:translateY(-5px);

}

.box h3{

    margin-bottom:10px;

}

@media(max-width:768px){

.grid{

grid-template-columns:1fr;

}

.header{

padding:20px;

}

}

</style>

</head>

<body>

<div class="header">

<div class="logo">

My Project

</div>

<div class="user">

<span>

<?=htmlspecialchars($user['username'])?>님 환영합니다.

</span>

<a class="logout" href="logout.php">

로그아웃

</a>

</div>

</div>

<div class="container">

<div class="card">

<h1>Dashboard</h1>

<p>

로그인에 성공했습니다.

이제부터 회원 기능과 게시판 기능을 하나씩 만들어 보겠습니다.

</p>

<div class="grid">

<div class="box">

<h3>회원관리</h3>

회원정보 관리

</div>

<div class="box">

<h3>게시판</h3>

CRUD 실습

</div>

<div class="box">

<h3>관리자</h3>

관리자 기능

</div>

</div>

</div>

</div>

</body>
</html>