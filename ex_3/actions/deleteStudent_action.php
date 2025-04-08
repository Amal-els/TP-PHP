<?php
include_once '../classes/autoloader.php';
if (isset($_GET['id'])) {
    Student::deleteStudent($_GET['id']);
    header("Location: ../views/students.php");
    exit();
}