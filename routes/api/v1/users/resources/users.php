<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'scope:admin,agent']], function () {
    Route::resources([
        'user' => \User\ResourceController::class,
    ]);
});
