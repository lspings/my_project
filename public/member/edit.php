<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: ../login.php");
    exit;

}


require_once "../../vendor/autoload.php";


use App\Repository\UserRepository;



if (!isset($_GET['id'])) {

    header("Location: index.php");
    exit;

}



$id = (int)$_GET['id'];



$userRepository = new UserRepository();


$user = $userRepository->findById($id);



if (!$user) {

    echo "회원을 찾을 수 없습니다.";
    exit;

}


?>


<!DOCTYPE html>
<html lang="ko">


<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>회원 수정</title>


<link rel="stylesheet" href="../assets/css/style.css">


</head>



<body class="dashboard-page">



<div class="dashboard-app">





<?php

require_once "../layout/sidebar.php";

?>





<div class="dashboard-main">





<?php

require_once "../layout/header.php";

?>






<main class="dashboard-content">






<div class="page-title">


<h1>
회원 수정
</h1>


</div>







<section class="dashboard-panel">





<form action="update.php" method="post">



<input 
type="hidden" 
name="id" 
value="<?= $user['id'] ?>">






<div class="form-group">


<label>
이름
</label>


<input
type="text"
name="username"
value="<?= htmlspecialchars($user['username']) ?>"
required>


</div>







<div class="form-group">


<label>
이메일
</label>


<input
type="email"
name="email"
value="<?= htmlspecialchars($user['email']) ?>"
required>


</div>








<div class="form-actions">


<button 
type="submit"
class="btn-primary">

수정 저장

</button>



<a 
href="index.php"
class="btn-secondary">

취소

</a>


</div>





</form>





</section>








</main>





</div>





</div>






<?php

require_once "../layout/footer.php";

?>
