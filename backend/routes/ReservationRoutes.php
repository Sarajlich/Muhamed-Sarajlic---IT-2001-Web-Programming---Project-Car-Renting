<?php
    Flight::route('GET /reservation/@id', function($id){
        Flight::json(Flight::reservationService()->getById($id));
    });

    Flight::route('GET /reservation', function(){
        Flight::json(Flight::reservationService()->getAll());
    });

    Flight::route('POST /reservation', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->createReservation($data));
    });

    Flight::route('PUT /reservation/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->update($id, $data));
    });

    Flight::route('PATCH /reservation/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->update($id, $data));
    });

    Flight::route('DELETE /reservation/@id', function($id){
        Flight::json(Flight::reservationService()->delete($id));
    });
?>
