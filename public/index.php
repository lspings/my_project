<?php

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Project</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


<div class="dashboard">


<header class="header">


<div class="logo">

My Project

</div>


<div class="user-area">


<span>
<?= htmlspecialchars($user['username']) ?>님 환영합니다.
</span>


<a href="logout.php">
로그아웃
</a>


</div>


</header>



<main class="main">


<div class="card-container">


<div class="card">

<h2>
회원 관리
</h2>

<p>
회원 정보를 관리합니다.
</p>

</div>



<div class="card">

<h2>
게시판
</h2>

<p>
게시판 서비스를 이용합니다.
</p>

</div>



<div class="card">

<h2>
관리자
</h2>

<p>
관리자 기능입니다.
</p>

</div>



</div>


</main>


</div>


</body>

</html>