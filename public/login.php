<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>로그인</title>

<link rel="stylesheet" href="assets/css/style.css">

<script src="assets/js/login.js" defer></script>

</head>

<body>

<div class="login-box">

<h1>My Project</h1>

<div class="sub">
로그인 후 서비스를 이용하세요.
</div>

<div id="error"></div>

<form id="loginForm">

<div class="input-group">

<label>이메일</label>

<input 
    type="email"
    name="email"
    required
>

</div>


<div class="input-group">

<label>비밀번호</label>

<input
    type="password"
    name="password"
    required
>

</div>


<button type="submit">
로그인
</button>


</form>


<div class="links">

<a href="#">회원가입</a>

<a href="#">비밀번호 찾기</a>

</div>


</div>


</body>

</html>