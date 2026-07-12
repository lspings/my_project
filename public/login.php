<?php

session_start();

if (isset($_SESSION['user'])) {

    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="ko">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Project Login</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>


<body class="login-page">



<div class="login-container">


    <div class="login-box">



        <div class="login-logo">

            <span>MY</span> PROJECT

        </div>




        <h1>
            로그인
        </h1>


        <p class="login-desc">
            My Project 관리자 시스템
        </p>





        <div id="error"></div>





        <form id="loginForm">



            <div class="input-group">


                <label>
                    이메일
                </label>


                <input 
                    type="email"
                    name="email"
                    placeholder="이메일을 입력하세요"
                    required
                >


            </div>





            <div class="input-group">


                <label>
                    비밀번호
                </label>


                <input 
                    type="password"
                    name="password"
                    placeholder="비밀번호를 입력하세요"
                    required
                >


            </div>






            <button type="submit">

                로그인

            </button>




        </form>





        <div class="login-footer">

            <a href="#">
                회원가입
            </a>


            <a href="#">
                비밀번호 찾기
            </a>


        </div>





    </div>


</div>





<script>


document
.getElementById("loginForm")
.addEventListener("submit", async function(e){


    e.preventDefault();


    const formData = new FormData(this);



    try {


        const response = await fetch("api/login.php", {

            method:"POST",

            body:formData

        });



        const result = await response.json();



        if(result.success){


            location.href="index.php";


        }else{


            document.getElementById("error").innerText =
            result.message;


        }



    }catch(error){


        document.getElementById("error").innerText =
        "로그인 처리 중 오류가 발생했습니다.";


    }



});


</script>



</body>

</html>