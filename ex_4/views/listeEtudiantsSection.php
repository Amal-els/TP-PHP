<?php
session_start();
include_once '../classes/autoloader.php';
if (isset($_GET['id'])) {
    $etudiants = Section::getStudents($_GET['id']); 
    include_once '../fragments/tableEtudiants.php';
    include_once '../fragments/header.php';
    tableauEtudiant($etudiants);
    include_once '../fragments/footer.php';
}