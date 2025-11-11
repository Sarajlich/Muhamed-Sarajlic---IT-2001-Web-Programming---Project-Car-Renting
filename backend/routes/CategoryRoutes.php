<?php
    Flight::route('GET /category/@id', function($id){
        Flight::json(Flight::categoryService()->getById($id));
    });

    Flight::route('GET /category', function(){
        $name = Flight::request()->query['name'] ?? null;
        if ($name) {
            Flight::json(Flight::categoryService()->getCategoryByName($name));
        } else {
            Flight::json(Flight::categoryService()->getAll());
        }
    });

    Flight::route('POST /category', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->createCategory($data));
    });

    Flight::route('PUT /category/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->update($id, $data));
    });

    Flight::route('PATCH /category/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->update($id, $data));
    });

    Flight::route('DELETE /category/@id', function($id){
        Flight::json(Flight::categoryService()->delete($id));
    });
?>
