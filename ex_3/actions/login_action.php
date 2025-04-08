<?php
require_once "../classes/User.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strip_tags($_POST['email']);
    $username=strip_tags($_POST['username']);

    if (User::login($email,$username)) {
        header("Location: ../views/dashboard.php");
        exit();
        
    } else {
        echo "Invalid credentials.";
    }
}
?>
