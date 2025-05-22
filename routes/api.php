<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MascotaController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\Isadmin;

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas públicas de mascotas
Route::get('/mascotas', [MascotaController::class, 'index']);
Route::get('/mascotas/{id}', [MascotaController::class, 'show']);

// Rutas protegidas para usuarios autenticados
Route::middleware([IsUserAuth::class])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'getUser']);

    // Crear, editar y eliminar tarjetas (requiere autenticación)
    Route::post('mascotas', [MascotaController::class, 'store']);
    Route::put('mascotas/{id}', [MascotaController::class, 'update']);
    Route::patch('mascotas/{id}', [MascotaController::class, 'updatePartial']);
    Route::delete('mascotas/{id}', [MascotaController::class, 'destroy']);
});

// Rutas para administrador
Route::middleware([Isadmin::class])->group(function () {
    Route::get('users', [AuthController::class, 'getAdmin']);
    Route::get('users/{id}', [AuthController::class, 'getUserById']);
    Route::put('users/{id}', [AuthController::class, 'updateUser']);
    Route::delete('users/{id}', [AuthController::class, 'deleteUser']);
});
