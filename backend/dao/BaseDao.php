<?php
require_once __DIR__ . '/../config.php';

class BaseDao {

    protected $table;
    protected $connection;

    public function __construct($table) {
        $this->table = $table;
        $this->connection = Database::connect();
    }

    public function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        if ($this->table === 'categories') {
            $id_column = 'category_id';
        } else {
            $id_column = rtrim($this->table, 's') . '_id';
        }
        $stmt = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE $id_column = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");
        
        if ($this->table === 'categories') {
            $id_column = 'category_id';
        } else {
            $id_column = rtrim($this->table, 's') . '_id';
        }

        $sql = "UPDATE " . $this->table . " SET $fields WHERE $id_column = :id";
        $stmt = $this->connection->prepare($sql);
    
        $data['id'] = $id;
        return $stmt->execute($data);
    }
 
    public function delete($id) {
        if ($this->table === 'categories') {
            $id_column = 'category_id';
        } else {
            $id_column = rtrim($this->table, 's') . '_id';
        }
        $stmt = $this->connection->prepare("DELETE FROM " . $this->table . " WHERE $id_column = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
 
}
?>