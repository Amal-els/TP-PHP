
<?php
session_start();
$pageTitle="listes des sections";
require_once "../classes/Section.php";
require_once "../fragments/navbar.php";
require_once "../fragments/footer.php";
require_once "../fragments/header.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$sectionObj = new Section();
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sections = $sectionObj->getAll($search);
?>
<h2>Liste des sections</h2>
    <br>
    <a class="btn btn-secondary" href="../exports/export_csv_stu.php" role="button">CSV</a>
    <a class="btn btn-secondary" href="../exports/export_pdf_stu.php" role="button">PDF</a>
    <a class="btn btn-secondary" href="../exports/export_excel_stu.php" role="button">Excel</a>
    <table id="sectionsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>DESIGNATION</th>
                <th>DESCRIPTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section) : ?>
                <tr>
                    <td><?= htmlspecialchars($section['id']); ?></td>
                    <td><?= htmlspecialchars($section['designation']); ?></td>
                    <td><?= htmlspecialchars($section['description']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>