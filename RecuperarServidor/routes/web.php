<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;

Route::apiResource('posts', PostController::class);
Route::apiResource('profiles', ProfileController::class);
Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});


