<?php
require_once "Database.php";

class Section {
    private $id;
    private $designation;
    private $description;

    public function __construct($id, $designation, $description) {
        $this->id = $id;
        $this->designation = $designation;
        $this->description = $description;
    }
    public function getId() { return $this->id; }
    public function getDesignation() { return $this->designation; }
    public function getDescription() { return $this->description; }

   
    public static function getAll($search = '') {
        $bd = DataBase::getInstance();
        $query = "SELECT * FROM section";
        if ($search) {
            $query .= " WHERE section.designation LIKE :search";
        }
        $stmt = $bd->prepare($query);
        if ($search) {
            $stmt->bindValue(':search', '%' . $search . '%');
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public static function getStudents($section_id = '') {
            $bd = DataBase::getInstance();
            $query = "SELECT e.id,e.name,e.birthday,s.designation,e.image FROM etudiant e join section s on e.section_id = s.id ";
            if ($section_id) {
                $query .= "where s.id = '$section_id' ;";
    
            }
            $res = $bd->query($query);
            return $res->fetchAll(PDO::FETCH_ASSOC);        
        }
        public static function getByDesignation($des) {
            $bd = Database::getInstance();
            $query = "SELECT id FROM section WHERE designation = '$des'";
            $res = $bd->query($query);
            return $res->fetch(PDO::FETCH_OBJ);    
        }
    
    }