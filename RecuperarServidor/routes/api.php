<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CheckApiToken;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SystemController;


Route::apiResource('posts', PostController::class);
Route::get('test', [SystemController::class, 'test']);
Route::get('/saludo', [SystemController::class, 'saludo']);
Route::get('/saludo/{nombre}', [SystemController::class, 'saludoNombre']);
Route::middleware('check.api.token')->get('/secure-test', [SystemController::class, 'secureTest']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);





