<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TarjetaController; // <- Corregido
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\Isadmin;

Route::get('/tarjetas', [TarjetaController::class, 'index']);
Route::post('/tarjetas', [TarjetaController::class, 'store']);
Route::get('/tarjetas/{id}', [TarjetaController::class, 'show']);
Route::put('/tarjetas/{id}', [TarjetaController::class, 'update']);
Route::patch('/tarjetas/{id}', [TarjetaController::class, 'updatePartial']);
Route::delete('/tarjetas/{id}', [TarjetaController::class, 'destroy']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware([IsUserAuth::class])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'getUser']);
    Route::post('tarjetas', [TarjetaController::class, 'store']);
});

// ADMIN ROUTES
Route::middleware([Isadmin::class])->group(function () {
    Route::get('users', [AuthController::class, 'getAdmin']);
    Route::get('users/{id}', [AuthController::class, 'getUserById']);
    Route::put('users/{id}', [AuthController::class, 'updateUser']);
    Route::delete('users/{id}', [AuthController::class, 'deleteUser']);
});
