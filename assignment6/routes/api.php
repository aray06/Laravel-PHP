<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // Оставь одну
use App\Http\Controllers\Api\CategoryController;

Route::get('products/{product}/categories', [CategoryController::class, 'getByProduct']);

Route::apiResource('categories', CategoryController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
