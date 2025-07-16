<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::get('/list-countries', [CountryController::class, 'index']);
    Route::get('/list-provinces', [ProvinceController::class, 'index']);
    Route::get('/list-cities', [CityController::class, 'index']);
});
