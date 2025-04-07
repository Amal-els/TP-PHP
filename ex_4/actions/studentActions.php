<?php
require_once "classes/Database.php";

class StudentActions {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    // Add a new student
    public function addStudent($name, $birthday, $image, $section_id) {
        $stmt = $this->pdo->prepare("INSERT INTO etudiant (name, birthday, image, section_id) VALUES (:name, :birthday, :image, :section_id)");
        return $stmt->execute([
            'name' => $name,
            'birthday' => $birthday,
            'image' => $image,
            'section_id' => $section_id
        ]);
    }

    // Update student
    public function updateStudent($id, $name, $birthday, $image, $section_id) {
        $stmt = $this->pdo->prepare("UPDATE etudiant SET name = :name, birthday = :birthday, image = :image, section_id = :section_id WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'birthday' => $birthday,
            'image' => $image,
            'section_id' => $section_id
        ]);
    }

    // Delete student
    public function deleteStudent($id) {
        $stmt = $this->pdo->prepare("DELETE FROM etudiant WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
