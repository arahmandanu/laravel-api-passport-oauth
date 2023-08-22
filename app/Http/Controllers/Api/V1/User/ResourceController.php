<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\AbstractController;
use App\Http\Requests\Api\V1\Users\UserCreateRequest;
use App\Http\Requests\Api\V1\Users\UserDeleteRequest;
use App\Http\Requests\Api\V1\Users\UserShowRequest;
use App\Http\Requests\Api\V1\Users\UserUpdateRequest;
use App\Http\Resources\Api\Response;
use App\Http\Resources\Api\ResponsePagination;
use App\Repositories\User\Create;
use App\Repositories\User\Destroy;
use App\Repositories\User\Find;
use App\Repositories\User\Update;
use App\Repositories\User\Where;
use Illuminate\Http\Request;

class ResourceController extends AbstractController
{
    public function index(Request $request)
    {
        $query = $this->FormatQuery($request->input());
        return $this->apiResponse(new ResponsePagination((new Where(...$query))->call()), true, 'success get list data');
    }

    public function store(UserCreateRequest $request)
    {
        return $this->apiResponse(new Response((new Create(...$request->except('password_confirmation')))->call()), true, 'success create new User');
    }

    public function show(UserShowRequest $request, $user)
    {
        return $this->apiResponse(new Response((new Find($user))->call()), true, 'success get data');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        return $this->apiResponse(new Response((new Update(payload: $request->except('user'), id: $id))->call()), true, 'success update data');
    }

    public function destroy(UserDeleteRequest $request, $id)
    {
        return $this->apiResponse(new Response((new Destroy(id: $id))->call()), true, 'success delete data');
    }
}
