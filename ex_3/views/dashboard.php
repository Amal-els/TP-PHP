<?php

$pageTitle="dashboard";
session_start();
require_once "../classes/Student.php";
require_once "../fragments/navbar.php";
require_once "../fragments/header.php";
/*$studentObj = new Student($_SESSION['user_id'],$_SESSION['username'],$_SESSION['email'],$_SESSION['role']);
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$students = $studentObj->getAll($search);
?>*/
?>
<h2><?php echo" Hello , PHP LOVERS! Welcome to your administration Platform" ?></h2>
<?php
if (!isset($_SESSION['user_id'])) {
  die("❌ You are not logged in. <a href='login.php'>Login</a>");
} else {
  echo "✅ Logged in as " . $_SESSION['username'] . " (" . $_SESSION['role'] . ")";
}
require_once "../fragments/footer.php";

?>
