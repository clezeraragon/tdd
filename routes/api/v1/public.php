<?php

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

Route::namespace('User')->group(function () {
    Route::resource('/user', 'UserController');
});

Route::namespace('Pathology')->group(function () {
    Route::resource('/pathology','PathologyController');
});

Route::namespace('Infection')->group(function () {
    Route::resource('/infection','InfectionController');
});



