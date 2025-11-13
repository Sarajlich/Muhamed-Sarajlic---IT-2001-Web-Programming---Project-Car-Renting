<?php
require_once __DIR__ . '/BaseDao.php';

class CarDao extends BaseDao{
    public function __construct(){
        parent::__construct('cars');
    }

    public function createCar($car){
        $data = [
            'brand'        => $car['brand'],
            'model'        => $car['model'],
            'year'         => $car['year'],
            'price_per_day'=> $car['price_per_day'],
            'status'    => $car['status'],
            'category_id'  => $car['category_id']
        ];
        return $this->insert($data);
    }

    public function getAllCars(){
        return $this->getAll();
    }

    public function getCarById($id){
        return $this->getById($id);
    }

    public function updateCar($id, $car){
        $data = [
            'brand'        => $car['brand'],
            'model'        => $car['model'],
            'year'         => $car['year'],
            'price_per_day'=> $car['price_per_day'],
            'status'    => $car['status'],
            'category_id'  => $car['category_id']
        ];
        return $this->update($id, $data);
    }

    public function deleteCar($id){
        return $this->delete($id);
    }


    public function getByBrand($brand) {
        $stmt = $this->connection->prepare("SELECT * FROM cars WHERE brand = :brand");
        $stmt->execute(['brand' => $brand]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>