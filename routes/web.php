<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PictureController;

Route::get('/', [IndexController::class, 'actionIndex']);

Route::get('city/getall', [CityController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'city/insert', [CityController::class, 'actionInsert']);
Route::get('city/delete/{idCity}', [CityController::class, 'actionDelete']);
Route::match(['get', 'post'], 'city/update/{idCity}', [CityController::class, 'actionUpdate']);


// Routes for the ReportController
Route::get('report/getall', [ReportController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'report/insert', [ReportController::class, 'actionInsert']);
Route::get('report/delete/{idReport}', [ReportController::class, 'actionDelete']);
Route::match(['get', 'post'], 'report/update/{idReport}', [ReportController::class, 'actionUpdate']);

// Routes for the PictureController
Route::get('picture/getall', [PictureController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'picture/insert', [PictureController::class, 'actionInsert']);
Route::get('picture/delete/{idImage}', [PictureController::class, 'actionDelete']);
Route::match(['get', 'post'], 'picture/update/{idImage}', [PictureController::class, 'actionUpdate']);