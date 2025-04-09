<?php
class ConnexionBD {
    private static $_dbname = "tp_php_ex3";
    private static $_user = "root";
    private static $_pwd = "AmAlEL20**SAmysql";
    private static $_host = "localhost";
    private static $_bdd = null;

    private function __construct() {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host . ":3306". ";dbname=" . self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance(): ?PDO {
        if (!self::$_bdd) {
            new ConnexionBD();
        }
        return (self::$_bdd);
    }
}