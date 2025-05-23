<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CheckApiToken;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

/**Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Aquí van tus rutas de API, por ejemplo:
Route::apiResource('posts', PostController::class);
Route::get('test', function () {
    return response()->json(['message' => 'API funcionando']);
});

// Ruta sin parámetro
Route::get('/saludo', function () {
    return response()->json(['mensaje' => 'Hola desde la API'], 200);
});

// Ruta con parámetro
Route::get('/saludo/{nombre}', function ($nombre) {
    return response()->json(['mensaje' => "Hola, $nombre"], 200);
});
// Ruta con middleware
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});

Route::middleware('check.api.token')->get('/secure-test', function () {
    return response()->json(['message' => 'Token válido']);
});

Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::post('/login', [AuthController::class, 'login']);




