<?php
include_once 'autoloader.php';
abstract class Repository implements IRepository
{
    protected $_bd;

    protected $_table;

    public function __construct($tableName)
    {
        $this->_table = $tableName;
        $this->_bd = Database::getInstance();
    }

    public function findAll()
    {
        $query = 'SELECT * FROM '.$this->_table;
        $res = $this->_bd->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->_bd->prepare("SELECT * FROM {$this->_table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res ? $res : null;
    }

    public function delete($id)
    {
        $query = 'delete from '.$this->_table.' where id = :id';
        $response = $this->_bd->prepare($query);
        $response->execute(['id' => $id]);
    }
    
    public function create($params)
    {
        $columns = implode(', ', array_keys($params));
        $placeholder = ':'.implode(', :', array_keys($params));
        $query = "INSERT INTO $this->_table ($columns) VALUES ($placeholder)";
        $stmt = $this->_bd->prepare($query);
        $stmt->execute($params);

        return $this->_bd->lastInsertId();
    }
}
 ?>