<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Person\StoreController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{page}', IndexController::class)->where('page', '.*');


