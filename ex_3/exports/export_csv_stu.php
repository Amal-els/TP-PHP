<?php
require_once "../classes/Database.php";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=students.csv');

$pdo = Database::connect();
$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nom', 'Date de Naissance', 'Section']);
$stmt = $pdo->query("SELECT students.*, sections.designation 
                     FROM students 
                     LEFT JOIN sections ON students.section_id = sections.id");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['id'], $row['name'], $row['birthday'], $row['designation'] ?? 'Non assigné']);
}

fclose($output);
?>
