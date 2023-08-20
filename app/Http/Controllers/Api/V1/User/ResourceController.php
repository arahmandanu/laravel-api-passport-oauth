<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\AbstractController;
use App\Http\Requests\Api\V1\Users\UserCreateRequest;
use App\Http\Requests\Api\V1\Users\UserShowRequest;
use App\Http\Requests\Api\V1\Users\UserUpdateRequest;
use App\Http\Resources\Api\Response;
use App\Http\Resources\Api\ResponsePagination;
use App\Http\Resources\Services\PaginationHelper;
use App\Repositories\User\Create;
use App\Repositories\User\Find;
use App\Repositories\User\Update;
use App\Repositories\User\Where;
use Illuminate\Http\Request;

class ResourceController extends AbstractController
{
    public function index(Request $request)
    {
        $query = (new PaginationHelper)->FormatQuery($request->input());

        return $this->apiResponse(new ResponsePagination((new Where(...$query))->call()), true, 'success get list data');
    }

    public function create()
    {
        //
    }

    public function store(UserCreateRequest $request)
    {
        return $this->apiResponse(new Response((new Create(...$request->except('password_confirmation')))->call()), true, 'success create new User');
    }


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
    public function update(UserUpdateRequest $request, $id)
    {
        return $this->apiResponse(new Response((new Update(payload: $request->except('user'), id: $id))->call()), true, 'success update data');
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
