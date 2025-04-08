<?php
$pageName= "Détails Etudiant";
include_once "../classes/autoloader.php";
include_once '../fragments/header.php';
$db = Database::getInstance();
$id = $_GET['id'];
if (!isset($id)) {
    header('Location: listeEtudiants.php');
}
$query = "SELECT * FROM etudiant where id = :id;";
$resultat = $db->prepare($query);
$resultat->execute(['id'=>$id]);
$info = $resultat->fetch(PDO::FETCH_OBJ); 
if (!($info)) {
    header('Location: students.php ');
    exit();
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
            <td><?= htmlspecialchars($info->name); ?></td>
        </tr>
        <tr>
            <td><?= $info->birthday?></td>
        </tr>
        <tr>
            <td><?php
                $id_section = htmlspecialchars($info->section_id) ;
                $query = "SELECT designation from section WHERE id = '$id_section'";
                $resultat = $db->query($query);
                $sec = $resultat->fetch(PDO::FETCH_OBJ); 
                echo $sec->designation;
                ?>
            </td>
        </tr>
    </tbody>
</table>
<?php }
include '../fragments/footer.php' ?>