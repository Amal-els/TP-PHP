<?php
require_once "../classes/Database.php";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=students.csv');

$pdo = Database::getInstance();
$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nom', 'Date de Naissance', 'Section']);
$stmt = $pdo->query("SELECT etudiant.*, section.designation 
                     FROM etudiant 
                     LEFT JOIN section ON etudiant.section_id = section.id");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['id'], $row['name'], $row['birthday'], $row['designation'] ?? 'Non assigné']);
}

fclose($output);
?>
