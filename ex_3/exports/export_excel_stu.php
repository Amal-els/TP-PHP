<?php
require_once "../vendor/autoload.php";
require_once "../classes/Database.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$pdo = Database::getInstance();
$stmt = $pdo->query("SELECT etudiant.*, section.designation 
                     FROM etudiant 
                     LEFT JOIN section ON etudiant.section_id = section.id");
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nom');
$sheet->setCellValue('C1', 'Date de Naissance');
$sheet->setCellValue('D1', 'Section');
$rowIndex = 2;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $sheet->setCellValue('A' . $rowIndex, $row['id']);
    $sheet->setCellValue('B' . $rowIndex, $row['name']);
    $sheet->setCellValue('C' . $rowIndex, $row['birthday']);
    $sheet->setCellValue('D' . $rowIndex, $row['designation'] ?? 'Non assigné');
    $rowIndex++;
}
$writer = new Xlsx($spreadsheet);
$fileName = 'students.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
$writer->save('php://output');
?>
