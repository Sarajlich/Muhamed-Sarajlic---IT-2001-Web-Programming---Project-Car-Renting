<?php
    Flight::route('GET /user/@id', function($id){
        Flight::json(Flight::userService()->getById($id));
    });

    Flight::route('GET /user', function(){
        $email = Flight::request()->query['email'] ?? null;
        if ($email) {
            Flight::json(Flight::userService()->getByEmail($email));
        } else {
            Flight::json(Flight::userService()->getAll());
        }
    });

    Flight::route('POST /user', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->createUser($data));
    });

    Flight::route('PUT /user/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->update($id, $data));
    });

    Flight::route('PATCH /user/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->update($id, $data));
    });

    Flight::route('DELETE /user/@id', function($id){
        Flight::json(Flight::userService()->delete($id));
    });
?>
