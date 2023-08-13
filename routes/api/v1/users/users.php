<?php

use App\Http\Controllers\Api\AuthenticationsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('personal_access', [AuthenticationsController::class, 'personalAccessToken'])->name('personal_access_token');
    Route::post('oauth', [AuthenticationsController::class, 'oauth'])->name('oauth_token');
});

Route::group(['middleware' => ['auth:api', 'scope:admin,agent']], function () {
    Route::resources([
        'user' => \User\ResourceController::class,
    ]);
});
