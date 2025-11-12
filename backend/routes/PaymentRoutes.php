<?php

    /**
     * @OA\Get(
     *     path="/payment",
     *     tags={"payments"},
     *     summary="Get all payments",
     *     @OA\Response(
     *         response=200,
     *         description="Array of all payments in the database"
     *     )
     * )
     */
    Flight::route('GET /payment', function(){
        Flight::json(Flight::paymentService()->getAll());
    });

    /**
     * @OA\Get(
     *     path="/payment/{id}",
     *     tags={"payments"},
     *     summary="Get a specific payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Payment ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the payment with the given ID"
     *     )
     * )
     */
    Flight::route('GET /payment/@id', function($id){
        Flight::json(Flight::paymentService()->getById($id));
    });

    /**
     * @OA\Post(
     *     path="/payment",
     *     tags={"payments"},
     *     summary="Add a new payment",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"reservation_id", "amount", "method", "date"},
     *             @OA\Property(property="reservation_id", type="integer", example=1),
     *             @OA\Property(property="amount", type="number", example=100.00),
     *             @OA\Property(property="method", type="string", example="Credit Card"),
     *             @OA\Property(property="date", type="string", format="date", example="2025-11-12")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment successfully created"
     *     )
     * )
     */
    Flight::route('POST /payment', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->createPayment($data));
    });

    /**
     * @OA\Put(
     *     path="/payment/{id}",
     *     tags={"payments"},
     *     summary="Update an existing payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Payment ID to update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"reservation_id", "amount", "method", "date"},
     *             @OA\Property(property="reservation_id", type="integer", example=1),
     *             @OA\Property(property="amount", type="number", example=120.00),
     *             @OA\Property(property="method", type="string", example="Debit Card"),
     *             @OA\Property(property="date", type="string", format="date", example="2025-11-13")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment successfully updated"
     *     )
     * )
     */
    Flight::route('PUT /payment/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->update($id, $data));
    });

    /**
     * @OA\Patch(
     *     path="/payment/{id}",
     *     tags={"payments"},
     *     summary="Partially update a payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Payment ID to partially update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="amount", type="number", example=130.00),
     *             @OA\Property(property="method", type="string", example="Cash"),
     *             @OA\Property(property="date", type="string", format="date", example="2025-11-15")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment partially updated"
     *     )
     * )
     */
    Flight::route('PATCH /payment/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::paymentService()->update($id, $data));
    });

    /**
     * @OA\Delete(
     *     path="/payment/{id}",
     *     tags={"payments"},
     *     summary="Delete a payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Payment ID to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment successfully deleted"
     *     )
     * )
     */
    Flight::route('DELETE /payment/@id', function($id){
        Flight::json(Flight::paymentService()->delete($id));
    });
?>
