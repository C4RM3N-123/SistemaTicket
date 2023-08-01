<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'actionIndex']);

// Routes for the user
Route::get('user/edit', [UserController::class, 'actionEditar'])->name('actionEditar');
Route::get('user/escribir', [UserController::class, 'actionEscribir'])->name('actionEscribir');
Route::get('user/login', [UserController::class, 'actionLoguear'])->name('actionLoguear');
Route::get('user/estado', [UserController::class, 'actionEstado'])->name('actionEstado');
Route::get('admi/verUsuario', [UserController::class, 'verUsuario'])->name('verUsuario');
Route::get('admi/verTicket', [UserController::class, 'verTicket'])->name('verTicket');


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