<?php

    /**
     * @OA\Get(
     *     path="/car",
     *     tags={"cars"},
     *     summary="Get all cars or filter by brand",
     *     @OA\Parameter(
     *         name="brand",
     *         in="query",
     *         required=false,
     *         description="Optional brand name to filter cars",
     *         @OA\Schema(type="string", example="Toyota")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Array of all cars in the database or filtered by brand"
     *     )
     * )
     */    

    Flight::route('GET /car', function(){
        $brand = Flight::request()->query['brand'] ?? null;
        if ($brand) {
            Flight::json(Flight::carService()->getByBrand($brand));
        } else {
            Flight::json(Flight::carService()->getAll());
        }
    });

    /**
     * @OA\Get(
     *     path="/car/{id}",
     *     tags={"cars"},
     *     summary="Get a specific car by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Car ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the car with the given ID"
     *     )
     * )
     */

    Flight::route('GET /car/@id', function($id){
        Flight::json(Flight::carService()->getById($id));
    });

    /**
     * @OA\Post(
     *     path="/car",
     *     tags={"cars"},
     *     summary="Add a new car",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"brand", "model", "price_per_day"},
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Corolla"),
     *             @OA\Property(property="year", type="integer", example=2022),
     *             @OA\Property(property="price_per_day", type="number", example=70.00),
     *             @OA\Property(property="status", type="string", example="AVAILABLE"),
     *             @OA\Property(property="category_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Car successfully created"
     *     )
     * )
     */

    Flight::route('POST /car', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->createCar($data));
    });

    /**
     * @OA\Put(
     *     path="/car/{id}",
     *     tags={"cars"},
     *     summary="Update an existing car by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Car ID to update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"brand", "model", "price_per_day"},
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Corolla Hybrid"),
     *             @OA\Property(property="year", type="integer", example=2023),
     *             @OA\Property(property="price_per_day", type="number", example=85.00),
     *             @OA\Property(property="status", type="string", example="AVAILABLE"),
     *             @OA\Property(property="category_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Car successfully updated"
     *     )
     * )
     */

    Flight::route('PUT /car/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->update($id, $data));
    });

    
    /**
     * @OA\Patch(
     *     path="/car/{id}",
     *     tags={"cars"},
     *     summary="Partially update a car by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Car ID to partially update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="brand", type="string", example="Toyota"),
     *             @OA\Property(property="model", type="string", example="Updated Model"),
     *             @OA\Property(property="price_per_day", type="number", example=95.00),
     *             @OA\Property(property="status", type="string", example="MAINTENANCE")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Car partially updated"
     *     )
     * )
     */

    Flight::route('PATCH /car/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::carService()->update($id, $data));
    });

    /**
     * @OA\Delete(
     *     path="/car/{id}",
     *     tags={"cars"},
     *     summary="Delete a car by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Car ID to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Car successfully deleted"
     *     )
     * )
     */

    Flight::route('DELETE /car/@id', function($id){
        Flight::json(Flight::carService()->delete($id));
    });
?>
