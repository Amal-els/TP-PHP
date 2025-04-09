<?php
class Database {
    private static $_host = "localhost";
    private static $_dbname = "db";
    private static $_username = "root";
    private static $_password = "AmAlEL20**SAmysql";
    private static $_pdo = null;

    private function __construct() {
        try {
            self::$_pdo = new PDO("mysql:host=" . self::$_host . ":3306". ";dbname=" . self::$_dbname . ";charset=utf8", self::$_username, self::$_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        } catch (PDOException $e) {
            die("❌ Connection failed: " . $e->getMessage());
        }
    }
    public static function getInstance(): ?PDO{
            if (!self::$_pdo) {
                new Database();
            }
            return (self::$_pdo);
        
        return self::$pdo;
    }
}

?>