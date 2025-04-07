<?php

$pageTitle="home";
require_once "../fragments/header.php" ;
require_once "../fragments/navbar.php" ;?>
<form method="POST" action="../actions/login_action.php">
    <label>Nom d'utilisateur :</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button class="btn btn-secondary"type="submit">Se connecter</button>
</form>
<?php
require_once "../fragments/footer.php";?>