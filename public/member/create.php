<?php

session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old']);

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

$pageTitle = "회원 등록";

?>

<!DOCTYPE html>
<html lang="ko">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>회원 등록</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="dashboard-page">

<div class="dashboard-app">

<?php require_once "../layout/sidebar.php"; ?>

<div class="dashboard-main">

<?php require_once "../layout/header.php"; ?>

<main class="dashboard-content">

<div class="page-title">

<h1>회원 등록</h1>

<a href="list.php" class="add-button">
목록
</a>

</div>

<section class="dashboard-panel">


<?php if(isset($errors['general'])): ?>

<div class="error">
    <?= $errors['general'] ?>
</div>

<?php endif; ?>

<form action="store.php" method="post" class="member-form">

<div class="form-group">

<label>이름</label>

<input
type="text"
name="username"
class="form-control"
value="<?= htmlspecialchars($old['username'] ?? '') ?>"
required>


<?php if(isset($errors['username'])): ?>

<div class="error">
    <?= $errors['username'] ?>
</div>

<?php endif; ?>


</div>

<div class="form-group">

<label>이메일</label>

<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($old['email'] ?? '') ?>"
required>


<?php if(isset($errors['email'])): ?>

<div class="error">
    <?= $errors['email'] ?>
</div>

<?php endif; ?>

</div>

<div class="form-group">

<label>비밀번호</label>

<input
type="password"
name="password"
class="form-control"
required>

<?php if(isset($errors['password'])): ?>

<div class="error">
    <?= $errors['password'] ?>
</div>

<?php endif; ?>

</div>

<div class="form-group">

<label>비밀번호 확인</label>

<input
type="password"
name="password_confirm"
class="form-control"
required>


<?php if(isset($errors['password_confirm'])): ?>

<div class="error">
    <?= $errors['password_confirm'] ?>
</div>

<?php endif; ?>

</div>

<div class="form-buttons">

<button
type="submit"
class="btn-save">

등록

</button>

<a
href="list.php"
class="btn-cancel">

취소

</a>

</div>

</form>

</section>

</main>

</div>

</div>

<?php require_once "../layout/footer.php"; ?>

</body>

</html>