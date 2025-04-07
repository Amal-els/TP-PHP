<?php
require_once "../vendor/autoload.php";
require_once "../classes/Database.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$pdo = Database::connect();
$stmt = $pdo->query("SELECT section.*, section.designation 
                     FROM section
                     LEFT JOIN etudiant ON etudiant.section_id = section.id");
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Designation');
$sheet->setCellValue('C1', 'Description');
$rowIndex = 2;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $sheet->setCellValue('A' . $rowIndex, $row['id']);
    $sheet->setCellValue('B' . $rowIndex, $row['designation']);
    $sheet->setCellValue('C' . $rowIndex, $row['description']);
    $rowIndex++;
}
$writer = new Xlsx($spreadsheet);
$fileName = 'sections.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
$writer->save('php://output');
?>
