<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginPostRequest;
use App\Http\Requests\Api\Auth\RefreshTokenPostRequest;
use App\Http\Requests\Api\Auth\SignOutPostRequest;
use App\Http\Resources\Api\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;

class AuthenticationsController extends Controller
{
    public function personalAccessToken(LoginPostRequest $request)
    {
        if (Auth::attempt(['email' => $request->validated()['username'], 'password' => $request->validated()['password']])) {
            $tokens = auth()->user()->createToken('api', auth()->user()->getRoleNames()->toArray());

            return $this->apiResponse(new Response([
                'tokens' => $tokens->accessToken,
                'type' => 'bearer',
                'expires_at' => $tokens->token->expires_at,
                'created_at' => $tokens->token->created_at,
            ]), true, 'success', 200);
        }

        return $this->apiResponse(null, false, 'User account invalid!', 404);
    }

    public function oauth(LoginPostRequest $request)
    {
        if (!Auth::attempt(['email' => $request->validated()['username'], 'password' => $request->validated()['password']])) {
            return $this->apiResponse(null, false, 'User account Not Found!', 404);
        }

        if (!auth()->user()->hasAnyRole(Role::all())) {
            return $this->apiResponse(null, false, 'You do not have permission to acces this page!', 403);
        }

        $attr = array_merge($request->validated(), ['scope' => auth()->user()->getRoleNames()->toArray()]);
        $response = Http::post(env('APP_URL', 'http://localhost:8000') . '/oauth/token', $attr);

        return $response->json();
    }

    public function oauthRefreshToken(RefreshTokenPostRequest $request)
    {
        $attr = array_merge($request->validated(), ['scope' => '']);
        $response = Http::post(env('APP_URL', 'http://localhost:8000') . '/oauth/token', $attr);

        return $response->json();
    }

    public function oauthSignOut(SignOutPostRequest $request)
    {
        $tokenId = auth()->user()->token()->id;
        if (empty($tokenId)) {
            return $this->apiResponse(null, false, 'Token not Found!', 404);
        }

        auth()->user()->token()->revoke();
        $refreshTokenRepository = app('Laravel\Passport\RefreshTokenRepository');
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);

        return $this->apiResponse(new Response([
            'Token has been reoved!',
        ]), true, 'Success!');
    }
}
