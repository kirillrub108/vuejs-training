<?php

use App\Http\Controllers\Person\DeleteController;
use App\Http\Controllers\Person\IndexController;
use App\Http\Controllers\Person\ShowController;
use App\Http\Controllers\Person\StoreController;
use App\Http\Controllers\Person\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'people'], function () {
    Route::post('/', StoreController::class);
    Route::get('/', IndexController::class);
    Route::get('/{person}', ShowController::class);
    Route::patch('/{person}', UpdateController::class);
    Route::delete('/{person}', DeleteController::class );
});
