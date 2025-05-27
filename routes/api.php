<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TarjetaController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\Isadmin;
use App\Http\Controllers\Api\UserController;

// Rutas públicas
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rutas públicas de tarjetas
Route::get('/tarjetas', [TarjetaController::class, 'index']);
Route::get('/tarjetas/{id}', [TarjetaController::class, 'show']);

// Rutas protegidas para usuarios autenticados
Route::middleware([IsUserAuth::class])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'getUser']);

    // Crear, editar y eliminar tarjetas (requiere autenticación)
    Route::post('tarjetas', [TarjetaController::class, 'store']);
    Route::put('tarjetas/{id}', [TarjetaController::class, 'update']);
    Route::patch('tarjetas/{id}', [TarjetaController::class, 'updatePartial']);
    Route::delete('tarjetas/{id}', [TarjetaController::class, 'destroy']);
});

// Rutas para administrador
Route::middleware([Isadmin::class])->group(function () {
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
});
