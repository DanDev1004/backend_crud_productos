<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return ApiResponse::success(
            'Categorías obtenidas correctamente.',
            Category::query()->orderBy('id')->get()
        );
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return ApiResponse::success('Categoría creada correctamente.', $category, 201);
    }

    public function show(Category $category): JsonResponse
    {
        return ApiResponse::success('Categoría obtenida correctamente.', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return ApiResponse::success('Categoría actualizada correctamente.', $category->refresh());
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete(); // SoftDeletes: se llena deleted_at y Spatie registra deleted.

        return ApiResponse::success('Categoría eliminada correctamente.');
    }
}

