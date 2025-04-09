<?php
require_once "Database.php";

class User {
    private $id;
    private $username;
    private $email;
    private $role;
    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }


    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isUser() {
        return $this->role === 'user';
    }
    
    public static function login($email, $username) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND username = :username");
        $stmt->execute(['email' => $email, 'username' => $username]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user_data) {
            session_start();
            $user = new User($user_data['id'], $user_data['username'], $user_data['email'], $user_data['role']);
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();
            return true;
        }
        return false;
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location:../views/login.php");
        exit();
    }
}
?> 