<?php

use App\Http\Controllers\Api\AuthenticationsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('personal_access', [AuthenticationsController::class, 'personalAccessToken'])->name('personal_access_token');
    Route::post('oauth', [AuthenticationsController::class, 'oauth'])->name('oauth_token');
    Route::post('oauth/refresh_token', [AuthenticationsController::class, 'oauthRefreshToken'])->name('oauth_refresh_token');

    Route::post('sign_out', [AuthenticationsController::class, 'oauthSignOut'])
        ->middleware(['auth:api', 'scope:admin,agent,supervisor'])
        ->name('oauth_sign_out');
});

/**
 * @OA\Post(
 *     path="/api/v1/auth/oauth",
 *     tags={"Authentication"},
 *     summary="User get token",
 *
 *     @OA\RequestBody(
 *
 *         @OA\MediaType(
 *             mediaType="application/json",
 *
 *             @OA\Schema(
 *
 *                 @OA\Property(
 *                     property="grant_type",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="username",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                @OA\Property(
 *                     property="client_id",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="client_secret",
 *                     type="string"
 *                 ),
 *                 example={"grant_type": "password", "username": "xxx@mail.com", "password": "12345678", "client_id": "your client id", "client_secret": "your client secret"}
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(response=200, description="OK", @OA\JsonContent()),
 *     @OA\Response(response=422, description="Failed Validation", @OA\JsonContent())
 * )
 */
