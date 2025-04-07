<?php
require_once "Database.php";

class Section {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::connect();
    }
    public function getAll($search = '') {
        $query = "SELECT * FROM section";
        if ($search) {
            $query .= " WHERE section.designation LIKE :search";
        }
        $stmt = $this->pdo->prepare($query);
        if ($search) {
            $stmt->bindValue(':search', '%' . $search . '%');
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }}