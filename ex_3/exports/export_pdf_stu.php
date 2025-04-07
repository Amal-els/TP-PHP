<?php
require_once "../classes/Database.php";
require_once "../vendor/setasign/fpdf/fpdf.php"; 

$pdo = Database::connect();
$stmt = $pdo->query("SELECT etudiant.*, section.designation 
                     FROM etudiant 
                     LEFT JOIN section ON etudiant.section_id = section.id");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(190, 10, 'Liste des étudiants', 1, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, 'ID', 1);
$pdf->Cell(60, 10, 'Nom', 1);
$pdf->Cell(50, 10, 'Date de Naissance', 1);
$pdf->Cell(50, 10, 'Section', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(60, 10, $row['name'], 1);
    $pdf->Cell(50, 10, $row['birthday'], 1);
    $pdf->Cell(50, 10, $row['designation'] ?? 'Non assigné', 1);
    $pdf->Ln();
}
$pdf->Output('D', 'students.pdf');
?>
