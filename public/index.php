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

<title>My Project Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>


<body class="dashboard-page">



<div class="dashboard-app">



    <!-- Sidebar -->


    <aside class="sidebar">


        <div class="brand">

            <span>MY</span> PROJECT

        </div>




        <nav class="sidebar-menu">


            <a href="#" class="active">

                🏠 Dashboard

            </a>


            <a href="#">

                👥 회원 관리

            </a>


            <a href="#">

                📝 게시판

            </a>


            <a href="#">

                📊 통계

            </a>


            <a href="#">

                ⚙ 설정

            </a>



        </nav>



    </aside>







    <!-- Main -->


    <div class="dashboard-main">





        <header class="dashboard-header">


            <div>

                <h2>
                    Dashboard
                </h2>


                <p>
                    서비스 현황을 확인하세요.
                </p>


            </div>






            <div class="user-profile">


                <div class="user-info">


                    <strong>
                    <?= htmlspecialchars($user['username']) ?>
                    </strong>


                    <small>
                    Administrator
                    </small>


                </div>




                <a href="logout.php">

                    로그아웃

                </a>



            </div>




        </header>








        <main class="dashboard-content">





            <section class="welcome-box">


                <h1>
                    안녕하세요 <?= htmlspecialchars($user['username']) ?>님 👋
                </h1>


                <p>
                    My Project 관리자 페이지입니다.
                </p>


            </section>








            <!-- Statistics -->


            <section class="stat-area">



                <div class="stat-card">


                    <div class="stat-icon">
                        👥
                    </div>


                    <div>

                        <span>
                        전체 회원
                        </span>


                        <strong>
                        1,250
                        </strong>


                    </div>


                </div>





                <div class="stat-card">


                    <div class="stat-icon">
                        📝
                    </div>


                    <div>

                        <span>
                        게시글
                        </span>


                        <strong>
                        856
                        </strong>


                    </div>


                </div>






                <div class="stat-card">


                    <div class="stat-icon">
                        👀
                    </div>


                    <div>

                        <span>
                        오늘 방문
                        </span>


                        <strong>
                        324
                        </strong>


                    </div>


                </div>




            </section>










            <section class="dashboard-grid">





                <div class="dashboard-panel">


                    <h3>
                        최근 활동
                    </h3>


                    <ul>


                        <li>

                            로그인 시스템 구축

                            <span>
                            Today
                            </span>

                        </li>



                        <li>

                            회원 관리 기능 준비

                            <span>
                            Yesterday
                            </span>

                        </li>



                        <li>

                            프로젝트 구조 개선

                            <span>
                            3 Days ago
                            </span>

                        </li>



                    </ul>



                </div>







                <div class="dashboard-panel">


                    <h3>
                        빠른 메뉴
                    </h3>



                    <div class="quick-menu">


                        <button>
                            회원 관리
                        </button>


                        <button>
                            게시판 관리
                        </button>


                        <button>
                            시스템 설정
                        </button>



                    </div>



                </div>





            </section>







        </main>





    </div>




</div>





</body>

</html>