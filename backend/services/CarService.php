<?php
require_once '../dao/CarDao.php';
require_once 'BaseService.php';

class CarService extends BaseService {
    public function __construct() {
        $dao = new CarDao();
        parent::__construct($dao);
    }

    public function getByBrand($brand) {
        return $this->dao->getByBrand($brand);
    }
 

    public function createCar($data) {
        if ($data['price_per_day'] <= 0) {
            throw new Exception('Price must be a positive value.');
        }
        return $this->create($data);
    }
}
?>