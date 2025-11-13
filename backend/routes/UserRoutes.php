<?php
    /**
     * @OA\Get(
     *     path="/user",
     *     tags={"users"},
     *     summary="Get all users or filter by email",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=false,
     *         description="Optional email to filter users",
     *         @OA\Schema(type="string", example="john.doe@example.com")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Array of all users or filtered by email"
     *     )
     * )
     */
    Flight::route('GET /user', function(){
        $email = Flight::request()->query['email'] ?? null;
        if ($email) {
            Flight::json(Flight::userService()->getByEmail($email));
        } else {
            Flight::json(Flight::userService()->getAll());
        }
    });

    /**
     * @OA\Get(
     *     path="/user/{id}",
     *     tags={"users"},
     *     summary="Get a specific user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the user with the given ID"
     *     )
     * )
     */
    Flight::route('GET /user/@id', function($id){
        Flight::json(Flight::userService()->getById($id));
    });

    /**
     * @OA\Post(
     *     path="/user",
     *     tags={"users"},
     *     summary="Add a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"first_name", "last_name", "email", "password"},
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User successfully created"
     *     )
     * )
     */
    Flight::route('POST /user', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->createUser($data));
    });

    /**
     * @OA\Put(
     *     path="/user/{id}",
     *     tags={"users"},
     *     summary="Update an existing user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID to update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"first_name", "last_name", "email"},
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", example="newpassword123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User successfully updated"
     *     )
     * )
     */
    Flight::route('PUT /user/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->update($id, $data));
    });

    /**
     * @OA\Patch(
     *     path="/user/{id}",
     *     tags={"users"},
     *     summary="Partially update a user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID to partially update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User partially updated"
     *     )
     * )
     */
    Flight::route('PATCH /user/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::userService()->update($id, $data));
    });

    /**
     * @OA\Delete(
     *     path="/user/{id}",
     *     tags={"users"},
     *     summary="Delete a user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User successfully deleted"
     *     )
     * )
     */
    Flight::route('DELETE /user/@id', function($id){
        Flight::json(Flight::userService()->delete($id));
    });
?>
