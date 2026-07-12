<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: ../login.php");
    exit;

}



require_once "../../vendor/autoload.php";

use App\Controller\UserController;

$userController = new UserController();

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

$result = $userController->getUsers($page, 10);

$users = $result['users'];

$total = $result['total'];

$limit = $result['limit'];

$totalPages = (int)ceil($total / $limit);

$pageTitle = "회원 관리";



?>


<!DOCTYPE html>
<html lang="ko">


<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>회원 관리</title>


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
회원 목록
</h1>



<a href="create.php" class="add-button">

+ 회원 등록

</a>



</div>







<section class="dashboard-panel">





<table class="member-table" >



<thead>
<tr>

<th>No</th>

<th>이름</th>

<th>Email</th>

<th>가입일</th>

<th>관리</th>


</tr>


</thead>





<tbody >

<?
$no = ($page - 1) * $limit + 1;
?>

<?php foreach ($users as $user): ?>

<tr>

<td style="text-align: center;">
     <?=$no++ ?>
</td>

<td style="text-align: center;">
    <?= htmlspecialchars($user['username']) ?>
</td>

<td style="text-align: center;">
    <?= htmlspecialchars($user['email']) ?>
</td>

<td style="text-align: center;">
    <?= $user['created_at'] ?>
</td>


<td class="action-buttons">

<a href="edit.php?id=<?= $user['id'] ?>" class="btn-edit">
수정
</a>

<a href="delete.php?id=<?= $user['id'] ?>"
class="btn-delete"
onclick="return confirm('삭제하시겠습니까?');">
삭제
</a>

</td>


</tr>


<?php endforeach; ?>



</tbody>



</table>




<div class="pagination">

<?php if($page > 1): ?>

<a href="?page=<?= $page-1 ?>">이전</a>

<?php endif; ?>


<?php for($i=1;$i<=$totalPages;$i++): ?>

<a href="?page=<?= $i ?>"
class="<?= $i==$page ? 'active' : '' ?>">

<?= $i ?>

</a>

<?php endfor; ?>


<?php if($page < $totalPages): ?>

<a href="?page=<?= $page+1 ?>">다음</a>

<?php endif; ?>

</div>


</section>







</main>







</div>







</div>







<?php

require_once "../layout/footer.php";

?>
