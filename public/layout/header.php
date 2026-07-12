<header class="dashboard-header">


    <div>

        <h2>
            <?= $pageTitle ?? 'Dashboard' ?>
        </h2>


        <p>
            My Project 관리 시스템
        </p>


    </div>





    <div class="user-profile">


        <div class="user-info">


            <strong>

            <?= htmlspecialchars($_SESSION['user']['username']) ?>

            </strong>


            <small>
            Administrator
            </small>


        </div>




        <a href="/my_project/public/logout.php">

            로그아웃

        </a>



    </div>


</header>