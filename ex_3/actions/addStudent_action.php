<?php
include_once '../classes/autoloader.php';
var_dump($_POST);
$name = strip_tags($_POST['name']);
$birthday = strip_tags($_POST['birthday']);
$section = strip_tags($_POST['section']);
$section_id = Section::getByDesignation($section)->id;
if (isset($_FILES["image"])) {
    $newFilePath = "../photos/".uniqid().$_FILES["image"]['name'];
    move_uploaded_file($_FILES["image"]['tmp_name'], $newFilePath);
}
else {
    header("Location:../views/addingStudent.php?errorMessage=No Image added");
    exit();    }
if (isset($name) && isset($birthday) && isset($section_id)) {
    $id = Student::addStudent($name,$birthday,$newFilePath,$section_id);
    header("Location:../views/students.php");
    exit();
}
else {
    header("Location:../views/addingStudent.php?errorMessage=Veuillez vérifier vos crédentials");
    exit();
    }
