<?php

use App\Http\Controllers\Api\V1\Authentications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['valid_api_request']], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('personal_access', [Authentications::class, 'personalAccessToken']);
        Route::post('oauth', [Authentications::class, 'oauth']);
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::resources([
            'user' => \User\ResourceController::class,
        ]);
    });
});
