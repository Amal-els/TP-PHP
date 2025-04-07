<?php
require_once "../classes/User.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username=$_POST['username'];

    if (User::login($email,$username)) {
        header("Location: ../views/dashboard.php");
        
    } else {
        echo "Invalid credentials.";
    }
}
?>
