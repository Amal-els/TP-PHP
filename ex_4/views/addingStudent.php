<?php 
$pageTitle = "Ajout d'un étudiant";
include "../fragments/header.php";?>

<form method="post" action="../actions/addStudent_action.php" enctype="multipart/form-data">
name : <input name="name" type="text" class="form-control">
birthday : <input name="birthday" type="text" class="form-control">
section: <br> 
        <select name="section" id="id" class="form-control">
            <option value="gl">GL(Genie Logiciel)</option>
            <option value="rt">RT(Réseaux Télécommunication)</option>
            <option value="iia">IIA(Informatique Industriel et Automatique)</option>
            <option value="imi">IMI(Instrumentation et Maintenance Industrielle)</option>
        </select>

<br>
image: <input name="image" type="file" class="form-control">
<button class="btn btn-primary" type="submit">
    Add
</button>
</form>