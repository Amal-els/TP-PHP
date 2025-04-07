<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "db";
    private static $username = "root";
    private static $password = "";
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("❌ Connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>