<?php
include_once '../classes/autoloader.php';
$res = '';
if ($_GET['page'] === 'etudiants') {
    $rows = Student::getAll();
    $res = 'id,name,birthday,image,section\n';
} elseif ($_GET['page'] === 'sections') {
    $rows = Section::getAll();
    $res = 'id,designation,description\n';
}

foreach ($rows as $row) {
    $res = $res.implode(',', $row) . '\\n';
}
echo $res;
?>