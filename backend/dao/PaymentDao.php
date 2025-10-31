<?php
require_once __DIR__ . '/BaseDao.php';

class PaymentDao extends BaseDao{
    public function __construct(){
        parent::__construct('payments');
    }

    public function createPayment($payment){
        $data = [
            'reservation_id' => $payment['reservation_id'],
            'amount'         => $payment['amount'],
            'date'           => $payment['date'],
            'method'         => $payment['method']
        ];
        return $this->insert($data);
    }

    public function getAllPayments(){
        return $this->getAll();
    }

    public function getPaymentById($id){
        return $this->getById($id);
    }

    public function updatePayment($id, $payment){
        $data = [
            'reservation_id' => $payment['reservation_id'],
            'amount'         => $payment['amount'],
            'date'           => $payment['date'],
            'method'         => $payment['method']
        ];
        return $this->update($id, $data);
    }

    public function deletePayment($id){
        return $this->delete($id);
    }
}
?>