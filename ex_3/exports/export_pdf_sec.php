<?php
require_once "../classes/Database.php";
require_once "../vendor/setasign/fpdf/fpdf.php"; // ✅ Correct

$pdo = Database::connect();
$stmt = $pdo->query("SELECT section.*, section.designation 
                     FROM section 
                     LEFT JOIN etudiant ON etudiant.section_id = section.id");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Liste des Sections', 1, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, 'ID', 1);
$pdf->Cell(60, 10, 'Designation', 1);
$pdf->Cell(50, 10, 'Description', 1);
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(60, 10, $row['designation'], 1);
    $pdf->Cell(50, 10, $row['description'], 1);
    $pdf->Ln();
}
$pdf->Output('D', 'sections.pdf');
?>
