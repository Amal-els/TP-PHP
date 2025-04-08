<?php
include_once "../classes/autoloader.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = $name = strip_tags($_POST['id']);
$name = strip_tags($_POST['name']);
$birthday = strip_tags($_POST['birthday']);
$section = strip_tags($_POST['section']);
}
$section_id = Section::getByDesignation($section)->id;
if (isset($_FILES["image"])) {
    $newFilePath = "../photos/".uniqid().$_FILES["image"]['name'];
    move_uploaded_file($_FILES["image"]['tmp_name'], $newFilePath);
   
    if (isset($id) && isset($name) && isset($birthday) && isset($section_id)) {
        Student::updateStudent($id,$name,$birthday,$newFilePath,$section_id);
        header("Location:../views/students.php");
        exit();
    }
    else {
        header("Location:../views/updatingStudent.php?errorMessage=Veuillez vérifier vos crédentials");
        exit();
        }

}
else {
    header("Location:../views/updatingStudent.php?errorMessage=No Image added");
    exit();  
}



?>