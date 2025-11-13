<?php
require_once __DIR__ . '/BaseDao.php';

class ReservationDao extends BaseDao{
    public function __construct(){
        parent::__construct('reservations');
    }

    public function createReservation($reservation){
        $data = [
            'user_id'     => $reservation['user_id'],
            'car_id'      => $reservation['car_id'],
            'start_date'  => $reservation['start_date'],
            'end_date'    => $reservation['end_date'],
            'total_price' => $reservation['total_price'],
            'status'      => $reservation['status']
        ];
        return $this->insert($data);
    }

    public function getAllReservations(){
        return $this->getAll();
    }

    public function getReservationById($id){
        return $this->getById($id);
    }

    public function updateReservation($id, $reservation){
        $data = [
            'user_id'     => $reservation['user_id'],
            'car_id'      => $reservation['car_id'],
            'start_date'  => $reservation['start_date'],
            'end_date'    => $reservation['end_date'],
            'total_price' => $reservation['total_price'],
            'status'      => $reservation['status']
        ];
        return $this->update($id, $data);
    }

    public function deleteReservation($id){
        return $this->delete($id);
    }

    public function getByUser($user_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reservations WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>