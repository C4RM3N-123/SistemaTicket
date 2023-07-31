<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;

use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'actionIndex']);
Route::get('user/edit', [UserController::class, 'actionEditar'])->name('actionEditar');
Route::get('user/escribir', [UserController::class, 'actionEscribir'])->name('actionEscribir');
Route::get('user/login', [UserController::class, 'actionLoguear'])->name('actionLoguear');
Route::get('user/estado', [UserController::class, 'actionEstado'])->name('actionEstado');
Route::get('admi/verUsuario', [UserController::class, 'verUsuario'])->name('verUsuario');
Route::get('admi/verTicket', [UserController::class, 'verTicket'])->name('verTicket');