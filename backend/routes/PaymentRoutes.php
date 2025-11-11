<?php
    Flight::route('GET /payment/@id', function($id){
        Flight::json(Flight::paymentService()->getById($id));
    });

    Flight::route('GET /payment', function(){
        Flight::json(Flight::paymentService()->getAll());
    });

    Flight::route('POST /payment', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->createPayment($data));
    });

    Flight::route('PUT /payment/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->update($id, $data));
    });

    Flight::route('PATCH /payment/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->update($id, $data));
    });

    Flight::route('DELETE /payment/@id', function($id){
        Flight::json(Flight::paymentService()->delete($id));
    });
?>
