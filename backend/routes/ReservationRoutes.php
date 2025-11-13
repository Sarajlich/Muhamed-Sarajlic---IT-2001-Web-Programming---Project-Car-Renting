<?php
    /**
     * @OA\Get(
     *     path="/reservation",
     *     tags={"reservations"},
     *     summary="Get all reservations",
     *     @OA\Response(
     *         response=200,
     *         description="Array of all reservations in the database"
     *     )
     * )
     */
    Flight::route('GET /reservation', function(){
        Flight::json(Flight::reservationService()->getAll());
    });

    /**
     * @OA\Get(
     *     path="/reservation/{id}",
     *     tags={"reservations"},
     *     summary="Get a specific reservation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reservation ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the reservation with the given ID"
     *     )
     * )
     */
    Flight::route('GET /reservation/@id', function($id){
        Flight::json(Flight::reservationService()->getById($id));
    });

    /**
     * @OA\Post(
     *     path="/reservation",
     *     tags={"reservations"},
     *     summary="Add a new reservation",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"car_id", "user_id", "start_date", "end_date", "status"},
     *             @OA\Property(property="car_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="start_date", type="string", format="date", example="2025-11-12"),
     *             @OA\Property(property="end_date", type="string", format="date", example="2025-11-15"),
     *             @OA\Property(property="status", type="string", example="CONFIRMED")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation successfully created"
     *     )
     * )
     */
    Flight::route('POST /reservation', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->createReservation($data));
    });

    /**
     * @OA\Put(
     *     path="/reservation/{id}",
     *     tags={"reservations"},
     *     summary="Update an existing reservation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reservation ID to update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"car_id", "user_id", "start_date", "end_date", "status"},
     *             @OA\Property(property="car_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="start_date", type="string", format="date", example="2025-11-12"),
     *             @OA\Property(property="end_date", type="string", format="date", example="2025-11-16"),
     *             @OA\Property(property="status", type="string", example="CANCELLED")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation successfully updated"
     *     )
     * )
     */
    Flight::route('PUT /reservation/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->update($id, $data));
    });

    /**
     * @OA\Patch(
     *     path="/reservation/{id}",
     *     tags={"reservations"},
     *     summary="Partially update a reservation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reservation ID to partially update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="COMPLETED")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation partially updated"
     *     )
     * )
     */
    Flight::route('PATCH /reservation/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::reservationService()->update($id, $data));
    });

    /**
     * @OA\Delete(
     *     path="/reservation/{id}",
     *     tags={"reservations"},
     *     summary="Delete a reservation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reservation ID to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation successfully deleted"
     *     )
     * )
     */
    Flight::route('DELETE /reservation/@id', function($id){
        Flight::json(Flight::reservationService()->delete($id));
    });
?>
