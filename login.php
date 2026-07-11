<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>로그인</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    background:#f5f7fb;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;

}

.login-box{

    width:380px;
    background:white;
    padding:40px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

h1{

    text-align:center;
    margin-bottom:10px;
    color:#333;

}

.sub{

    text-align:center;
    color:#888;
    margin-bottom:30px;

}

.input-group{

    margin-bottom:18px;

}

label{

    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#555;

}

input{

    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
    transition:.3s;

}

input:focus{

    border-color:#4f8ef7;

}

button{

    width:100%;
    padding:14px;
    background:#4f8ef7;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:16px;
    transition:.3s;

}

button:hover{

    background:#3a77d6;

}

.links{

    margin-top:20px;
    text-align:center;

}

.links a{

    color:#4f8ef7;
    text-decoration:none;
    margin:0 10px;

}

#error{

    margin-bottom:15px;
    color:red;
    text-align:center;

}

</style>

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
required>

</div>

<div class="input-group">

<label>비밀번호</label>

<input
type="password"
name="password"
required>

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

<script>
const form = document.getElementById("loginForm");

form.addEventListener("submit", async function (e) {

    e.preventDefault();

    const formData = new FormData(form);

    try {

        const response = await fetch("login_process.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        if (result.success) {

            location.href = "index.php";

        } else {

            document.getElementById("error").innerText = result.message;

        }

    } catch (error) {

        document.getElementById("error").innerText =
            "서버 오류가 발생했습니다.";

        console.error(error);

    }

});

</script>

</body>

</html>