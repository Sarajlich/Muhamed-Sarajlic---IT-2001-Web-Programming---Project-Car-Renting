<?php
    Flight::route('GET /car/@id', function($id){
        Flight::json(Flight::carService()->getById($id));
    });

    Flight::route('GET /car', function(){
        $brand = Flight::request()->query['brand'] ?? null;
        if ($brand) {
            Flight::json(Flight::carService()->getByBrand($brand));
        } else {
            Flight::json(Flight::carService()->getAll());
        }
    });

    Flight::route('POST /car', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->createCar($data));
    });

    Flight::route('PUT /car/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->update($id, $data));
    });

    Flight::route('PATCH /car/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->update($id, $data));
    });

    Flight::route('DELETE /car/@id', function($id){
        Flight::json(Flight::carService()->delete($id));
    });
?>
