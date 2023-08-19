<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\AbstractController;
use App\Http\Requests\Api\V1\Users\UserCreateRequest;
use App\Http\Requests\Api\V1\Users\UserShowRequest;
use App\Http\Resources\Api\Response;
use App\Http\Resources\Api\ResponsePagination;
use App\Http\Resources\Services\PaginationHelper;
use App\Repositories\User\Create;
use App\Repositories\User\Find;
use App\Repositories\User\Where;
use Illuminate\Http\Request;

class ResourceController extends AbstractController
{
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
    public function index(Request $request)
    {
        $query = (new PaginationHelper)->FormatQuery($request->input());

        return $this->apiResponse(new ResponsePagination((new Where(...$query))->call()), true, 'success get data');
    }

    public function create()
    {
        //
    }

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
     * *                 @OA\Property(
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
     * Display the specified resources.
     *
     * @param  string  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserCreateRequest $request)
    {
        return $this->apiResponse(new Response((new Create(...$request->except('password_confirmation')))->call()), true, 'success create new User');
    }

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
     * Display the specified resources.
     *
     * @param  string  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(UserShowRequest $request, $user)
    {
        return $this->apiResponse(new Response((new Find($user))->call()), true, 'success get data');
    }

    /**
     * Show the form for editing the specified resources.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resources in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
