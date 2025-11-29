<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//aca iniciamos a escribir codigo//
Route::post('/registrer', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/me', [AuthController::class, 'me']);

Route::get('/users', [UsersControler::class, 'index']);
Route::post('/users', [UsersControler::class, 'store']);
Route::get('/users/{id}', [UsersControler::class, 'show']);
Route::put('/users/{id}', [UsersControler::class, 'update']);
Route::patch('/users/{id}', [UsersControler::class, 'update']);
Route::delete('/users/{id}', [UsersControler::class, 'destroy']);

//routes de api de canciones //
use App\Http\Controllers\CancionesCONTROLLER;
Route::post('/canciones', [CancionesCONTROLLER::class, 'nuevaCancion']);
// Ruta para LEER TODAS las canciones (GET) por que va a sergresar un valor en pantalla
Route::get('/canciones', [CancionesController::class, 'index']);
// Ruta para BORRAR una canción específica (DELETE)
Route::delete('/canciones/{id}', [CancionesController::class, 'destroy']);
