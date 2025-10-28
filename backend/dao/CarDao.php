<?php

require_once 'BaseDao.php';

class CarDao extends BaseDao {
    public function __construct() {
        parent::__construct("cars");
    }

    public function getByCategoryId($category_id) {
        $stmt = $this->connection->prepare("SELECT * FROM cars WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAvailableCars() {
        $stmt = $this->connection->prepare("SELECT * FROM cars WHERE status = 'AVAILABLE'");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
