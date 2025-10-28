<?php

require_once 'BaseDao.php';

class ReservationDao extends BaseDao {
    public function __construct() {
        parent::__construct("reservations");
    }

    public function getByUserId($user_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reservations WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByCarId($car_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reservations WHERE car_id = :car_id");
        $stmt->bindParam(':car_id', $car_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>