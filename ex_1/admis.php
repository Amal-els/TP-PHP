<?php 
require_once "etudiant.php";
require_once "session.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center">Résultats des Étudiants</h1>

    <?php SessionManager::gererVisites(); ?>

    <div class="row justify-content-center">
        <?php foreach ($etudiants as $etudiant): ?>
            <?= $etudiant->afficherResultats(); ?>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
