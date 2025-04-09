
<?php
include_once '../classes/autoloader.php';
var_dump($_POST);
$name = strip_tags($_POST['name']);
$birthday = strip_tags($_POST['birthday']);
$section = strip_tags($_POST['section']);
$section_id = Section::getByDesignation($section)->id;

if (isset($_FILES["image"]) &&  $_FILES["image"]["error"] == 0 ) {
    $newFilePath = "../photos/".$name.".jpg";
    move_uploaded_file($_FILES["image"]['tmp_name'], $newFilePath);
}
else {
    $newFilePath = "../photos/default.jpg";
}
if (empty($name) || empty($birthday) || empty($section_id)) {
    header("Location: ../views/addingStudent.php?errorMessage=Veuillez vérifier vos informations");
    exit();
}
else {
    $id = Student::addStudent($name,$birthday,$newFilePath,$section_id);
    header("Location: ../views/students.php");
    exit();
}

