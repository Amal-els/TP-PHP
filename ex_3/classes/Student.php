<?php
require_once "Database.php";
class Student {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::connect();
    }
    public function getAll($search = '') {
        $query = "SELECT etudiant.*, section.designation 
                  FROM etudiant 
                  LEFT JOIN section ON etudiant.section_id = section.id";
        if ($search) {
            $query .= " WHERE etudiant.name LIKE :search";
        }
        $stmt = $this->pdo->prepare($query);
        if ($search) {
            $stmt->bindValue(':search', '%' . $search . '%');
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
