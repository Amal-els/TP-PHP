<?php
require_once "Database.php";
class Student {
    private $id;
    private $name;
    private $birthday;
    private $image;
    private $section_id;
    public function __construct($id, $name, $birthday, $image, $section) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->section_id = $section;
    }
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getImage() {
        return $this->image;
    }

    public function getSectionId() {
        return $this->section_id;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getSection() {
        return Section::getById($this->section_id);
    }
    public static function getAll($search = '') {
        $bd = Database::getInstance();
        $query = "SELECT etudiant.*, section.designation 
                  FROM etudiant 
                  JOIN section ON etudiant.section_id = section.id";
        if ($search) {
            $query .= " WHERE etudiant.name LIKE '%$search%'";
        }
        $res = $bd->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getById($id) 
    {
        $bd = Database::getInstance();
        $query = "SELECT e.name AS name,e.birthday AS birthday,e.image AS image,s.designation AS sec FROM 
                            etudiant e JOIN section s on e.section_id = s.id
                            where e.id=$id;";
        $res = $bd->query($query);
        return $res->fetch(PDO::FETCH_OBJ);
    }

    public static function updateStudent($id, $name, $birthday, $image, $section_id) {
        $bd = Database::getInstance();
        $stmt = $bd->prepare("UPDATE etudiant SET name = :name, birthday = :birthday, image = :image, section_id = :section_id  where id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'birthday' => $birthday,
            'image' => $image,
            'section_id' => $section_id
        ]);
    }
    public static function addStudent($name, $birthday, $image, $section_id) {
        $bd = Database::getInstance();
        $query = "SELECT MAX(id) AS id from etudiant";
        $res = $bd->query($query);
        $id = $res->fetch(PDO::FETCH_ASSOC)['id'];
        $stmt = $bd->prepare("INSERT INTO etudiant VALUES(:id,:name,:birthday,:image,:section_id)");
        $stmt->execute([
            'id' => $id+1,
            'name' => $name,
            'birthday' => $birthday,
            'image' => $image,
            'section_id' => $section_id
        ]);
        return $id;
    }
    public static function deleteStudent($id){
        $bd = Database::getInstance();
        $stmt = $bd->prepare("DELETE FROM etudiant WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    public static function getStudentImageById($id){
        $bd = Database::getInstance();
        $query = "SELECT image FROM etudiant where id=$id;";
        $res = $bd->query($query);
        return $res->fetch(PDO::FETCH_OBJ);
    }
}
?>
