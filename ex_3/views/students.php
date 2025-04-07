<?php
session_start();
$pageTitle="listes des etudiants";
require_once "../classes/Student.php";
require_once "../fragments/navbar.php";
require_once "../fragments/footer.php";
require_once "../fragments/header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}?>

<?php
$studentObj = new Student();
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$students = $studentObj->getAll($search);
?>

    <h2>Liste des etudiants</h2>
    <form method="GET" action="">
        <label for="search">Rechercher par nom :</label>
        <input type="text" id="search" name="search" value="<?= htmlspecialchars($search); ?>">
        <button type="submit">Filtrer</button>
    </form>
    <br>
    <a class="btn btn-secondary" href="../exports/export_csv_stu.php" role="button">CSV</a>
    <a class="btn btn-secondary" href="../exports/export_pdf_stu.php" role="button">PDF</a>
    <a class="btn btn-secondary" href="../exports/export_excel_stu.php" role="button">Excel</a>
    <table id="studentsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']); ?></td>
                    <td>
                    <img src="<?= !empty($student['image']) ? htmlspecialchars($student['image']) : 'default.jpg'; ?>" 
     alt="Photo de <?= htmlspecialchars($student['name'] ?? 'Inconnu'); ?>" 
     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
     onerror="this.onerror=null; this.src='default.jpg';">
                    </td>
                    <td><?= htmlspecialchars($student['name']); ?></td>
                    <td><?= htmlspecialchars($student['birthday']); ?></td>
                    <td><?= htmlspecialchars($student['designation'] ?? 'Non assigné'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</body>
</html>