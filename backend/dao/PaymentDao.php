<?php

require_once 'BaseDao.php';

class PaymentDao extends BaseDao {
    public function __construct() {
        parent::__construct("payments");
    }

    public function getByReservationId($reservation_id) {
        $stmt = $this->connection->prepare("SELECT * FROM payments WHERE reservation_id = :reservation_id");
        $stmt->bindParam(':reservation_id', $reservation_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByUserId($user_id) {
        $stmt = $this->connection->prepare("SELECT p.* 
                                            FROM payments p
                                            JOIN reservations r ON p.reservation_id = r.reservation_id
                                            WHERE r.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>