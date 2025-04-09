<?php
$pageTitle = "Modification d'un étudiant";
$id = $_GET['id'];
include "../fragments/header.php";
include_once '../classes/autoloader.php';
?>

<form method="post" action="../actions/updateStudent_action.php" enctype="multipart/form-data">
<?php if (!isset($id)) {
    header("Location: ../views/students.php");
    exit();
} 

?>
<input  value = <?=$id?> name = 'id' type = "hidden" >
name : <input name="name" type="text" value = <?=Student::getById($id)->name?> class="form-control">
birthday : <input name="birthday" type="text" value = "<?=Student::getById($id)->birthday?>" class="form-control">
section: <br> 
        <select name="section" id="id" value = <?=Student::getById($id)->sec?> class="form-control">
            <option value="gl">GL(Genie Logiciel)</option>
            <option value="rt">RT(Réseaux Télécommunication)</option>
            <option value="iia">IIA(Informatique Industriel et Automatique)</option>
            <option value="imi">IMI(Instrumentation et Maintenance Industrielle)</option>
        </select>

<br>
image: <input name="image" type="file" <?=Student::getById($id)->image?> class="form-control">
<button class="btn btn-primary" type="submit">
    Update
</button>
</form>
<?php
