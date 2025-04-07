<?php
$pageName= "Détails Etudiant";
include_once "../class/autoloader.php";
include_once '../fragments/header.php';
$db = ConnexionBD::getInstance();
$id = $_GET['id'];
if (!isset($id)) {
    header('Location: listeEtudiants.php');
}
$query = "SELECT * FROM student where id = :id;";
$resultat = $db->prepare($query);
$resultat->execute(['id'=>$id]);
$info = $resultat->fetch(PDO::FETCH_OBJ); 
if (!($info)) {
    header('Location: listeEtudiants.php ');
}
else {
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $info->id?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $info->name ?></td>
        </tr>
        <tr>
            <td><?= $info->specialite ?></td>
        </tr>
        <tr>
            <td><?= $info->birthday?></td>
        </tr>
    </tbody>
</table>
<?php }
include '../fragments/footer.php' ?>