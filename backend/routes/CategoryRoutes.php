<?php
    /**
     * @OA\Get(
     *     path="/category",
     *     tags={"categories"},
     *     summary="Get all categories or filter by name",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=false,
     *         description="Optional category name to filter categories",
     *         @OA\Schema(type="string", example="SUV")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Array of all categories or filtered by name"
     *     )
     * )
     */
    Flight::route('GET /category', function(){
        $name = Flight::request()->query['name'] ?? null;
        if ($name) {
            Flight::json(Flight::categoryService()->getCategoryByName($name));
        } else {
            Flight::json(Flight::categoryService()->getAll());
        }
    });

    /**
     * @OA\Get(
     *     path="/category/{id}",
     *     tags={"categories"},
     *     summary="Get a specific category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the category with the given ID"
     *     )
     * )
     */
    Flight::route('GET /category/@id', function($id){
        Flight::json(Flight::categoryService()->getById($id));
    });

    /**
     * @OA\Post(
     *     path="/category",
     *     tags={"categories"},
     *     summary="Add a new category",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "description"},
     *             @OA\Property(property="name", type="string", example="SUV"),
     *             @OA\Property(property="description", type="string", example="Sport utility vehicles")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category successfully created"
     *     )
     * )
     */
    Flight::route('POST /category', function(){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->createCategory($data));
    });

    /**
     * @OA\Put(
     *     path="/category/{id}",
     *     tags={"categories"},
     *     summary="Update an existing category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID to update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "description"},
     *             @OA\Property(property="name", type="string", example="Updated SUV"),
     *             @OA\Property(property="description", type="string", example="Updated description for SUV")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category successfully updated"
     *     )
     * )
     */
    Flight::route('PUT /category/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->update($id, $data));
    });

    /**
     * @OA\Patch(
     *     path="/category/{id}",
     *     tags={"categories"},
     *     summary="Partially update a category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID to partially update",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Updated SUV"),
     *             @OA\Property(property="description", type="string", example="New description for SUV")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category partially updated"
     *     )
     * )
     */
    Flight::route('PATCH /category/@id', function($id){
        $data = Flight::request()->data->getData();
        Flight::json(Flight::categoryService()->update($id, $data));
    });

    /**
     * @OA\Delete(
     *     path="/category/{id}",
     *     tags={"categories"},
     *     summary="Delete a category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category successfully deleted"
     *     )
     * )
     */
    Flight::route('DELETE /category/@id', function($id){
        Flight::json(Flight::categoryService()->delete($id));
    });
?>
