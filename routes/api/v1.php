<?php

use App\Http\Controllers\Api\AuthenticationsController;
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
        Route::post('personal_access', [AuthenticationsController::class, 'personalAccessToken'])->name('personal_access_token');
        Route::post('oauth', [AuthenticationsController::class, 'oauth'])->name('oauth_token');
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::resources([
            'user' => \User\ResourceController::class,
        ]);
    });
});
