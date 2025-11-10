<?php
require_once '../dao/PaymentDao.php';
require_once 'BaseService.php';

class PaymentService extends BaseService {
    public function __construct() {
        $dao = new PaymentDao();
        parent::__construct($dao);
    }

    public function createPayment($data) {

        if ($data['amount'] <= 0) {
            throw new Exception('Payment amount must be a positive value.');
        }

        if (empty($data['method'])) {
            throw new Exception('Payment method is required.');
        }

        return $this->create($data);
    }
}
?>