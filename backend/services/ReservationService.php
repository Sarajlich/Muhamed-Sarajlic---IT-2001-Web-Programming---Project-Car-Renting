<?php
require_once '../dao/ReservationDao.php';
require_once 'BaseService.php';

class ReservationService extends BaseService {
    public function __construct() {
        $dao = new ReservationDao();
        parent::__construct($dao);
    }

    public function getByUser($user_id) {
        return $this->dao->getByUser($user_id);
    }

    public function createReservation($data) {

        if (empty($data['car_id']) || empty($data['user_id'])) {
            throw new Exception('Reservation must include both car_id and user_id.');
        }

        if (strtotime($data['end_date']) <= strtotime($data['start_date'])) {
            throw new Exception('End date must be after start date.');
        }

        return $this->create($data);
    }
}
?>
