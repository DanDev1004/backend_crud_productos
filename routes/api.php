<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Support\ApiResponse;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)
    ->missing(fn () => ApiResponse::error('Categoría no encontrada.', [], 404));

Route::apiResource('products', ProductController::class)
    ->missing(fn () => ApiResponse::error('Producto no encontrado.', [], 404));

Route::fallback(fn () => ApiResponse::error('Endpoint no encontrado.', [], 404));

