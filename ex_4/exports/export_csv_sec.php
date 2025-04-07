<?php
require_once "../classes/Database.php";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=sections.csv');
$pdo = Database::connect();
$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Designation', 'Description']);
$stmt = $pdo->query("SELECT section.*, section.designation 
                     FROM section
                     LEFT JOIN etudiant ON etudiant.section_id = section.id");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['id'], $row['designation'], $row['description']?? 'Non assigné']);
}

fclose($output);
?>
