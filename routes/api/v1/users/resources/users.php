<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'scope:admin,staff,reguler']], function () {
    Route::resources([
        'user' => \User\ResourceController::class,
    ]);
});

/**
 * @OA\Get(
 *     path="/api/v1/user",
 *     tags={"Users"},
 *     security={{"bearer_token": {}}},
 *     summary="Get List Users",
 *     description="Returns list user data",
 *
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Filter by page",
 *         required=true,
 *         explode=true,
 *
 *         @OA\Schema(
 *             default="0",
 *             type="integer",
 *         )
 *     ),
 *
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Limit Per Page",
 *         required=true,
 *         explode=true,
 *
 *         @OA\Schema(
 *             default="10",
 *             type="integer",
 *         )
 *     ),
 *
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         description="Query by name",
 *         required=false,
 *         explode=true,
 *
 *         @OA\Schema(
 *             default="",
 *             type="string",
 *         )
 *     ),
 *
 *     @OA\Response(response="200", description="List User", @OA\JsonContent()),
 *     @OA\Response(response="422", description="Failed Validation", @OA\JsonContent())
 * )
 */

/**
 * @OA\Post(
 *     path="/api/v1/user",
 *     tags={"Users"},
 *     security={{"bearer_token": {}}},
 *     summary="Adds a new user - with oneOf examples",
 *
 *     @OA\RequestBody(
 *
 *         @OA\MediaType(
 *             mediaType="application/json",
 *
 *             @OA\Schema(
 *
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password_confirmation",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="role",
 *                     enum={"admin", "staff", "reguler"}
 *                 ),
 *                 example={"name": "Missutsan", "email": "xxx@mail.com", "password": "12345678", "password_confirmation": "12345678", "role": "xxx"}
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(response=200, description="OK", @OA\JsonContent()),
 *     @OA\Response(response=422, description="Failed Validation", @OA\JsonContent())
 * )
 */

/**
 * @OA\Put(
 *     path="/api/v1/user",
 *     tags={"Users"},
 *     security={{"bearer_token": {}}},
 *     summary="Adds a new user - with oneOf examples",
 *
 *     @OA\RequestBody(
 *
 *         @OA\MediaType(
 *             mediaType="application/json",
 *
 *             @OA\Schema(
 *
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password_confirmation",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="role",
 *                     enum={"admin", "staff", "reguler"}
 *                 ),
 *                 example={"name": "Missutsan", "email": "xxx@mail.com", "password": "12345678", "password_confirmation": "12345678", "role": "xxx"}
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(response=200, description="OK", @OA\JsonContent()),
 *     @OA\Response(response=422, description="Failed Validation", @OA\JsonContent())
 * )
 */

/**
 * @OA\Get(
 *     path="/api/v1/user/{id}",
 *     tags={"Users"},
 *     security={{"bearer_token": {}}},
 *      summary="Get Detail User",
 *      description="Returns user data",
 *
 *      @OA\Parameter(
 *          name="id",
 *          description="user id",
 *          required=true,
 *          in="path",
 *
 *          @OA\Schema(type="string"),
 *
 *          @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
 *      ),
 *
 *     @OA\Response(response="200", description="Detail User", @OA\JsonContent()),
 *     @OA\Response(response="422", description="Failed Validation", @OA\JsonContent())
 * )
 */

/**
 * @OA\Delete(
 *     path="/api/v1/user/{id}",
 *     tags={"Users"},
 *     security={{"bearer_token": {}}},
 *      summary="Delete User",
 *      description="Returns Success message delete",
 *
 *      @OA\Parameter(
 *          name="id",
 *          description="user id",
 *          required=true,
 *          in="path",
 *
 *          @OA\Schema(type="string"),
 *
 *          @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
 *      ),
 *
 *     @OA\Response(response="200", description="Detail User", @OA\JsonContent()),
 *     @OA\Response(response="422", description="Failed Validation", @OA\JsonContent())
 * )
 */
