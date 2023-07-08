<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginPostRequest;
use App\Http\Resources\Api\Response;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authentications extends Controller
{
    public function login(LoginPostRequest $request)
    {
        if (Auth::attempt(['email' => $request->validated()['username'], 'password' => $request->validated()['password']])) {
            $tokens =  auth()->user()->createToken('api', auth()->user()->getRoleNames()->toArray());

            return $this->apiResponse(new Response([
                'tokens' => $tokens->accessToken,
                'type' => 'bearer',
                'expires_at' => $tokens->token->expires_at,
                'created_at' => $tokens->token->created_at,
            ]), true, 'success', 200);
        }

        return $this->apiResponse(null, false, 'User account invalid!', 200);
    }
}
