<?php
require_once __DIR__ . '/BaseDao.php';

class CarDao extends BaseDao{
    public function __construct(){
        parent::__construct('cars');
    }

    public function getByBrand($brand) {
        $stmt = $this->connection->prepare("SELECT * FROM cars WHERE brand = :brand");
        $stmt->execute(['brand' => $brand]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>