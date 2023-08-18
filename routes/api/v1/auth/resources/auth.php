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
