<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::query()
            ->with('category:id,name') // Eager Loading: evita N+1.
            ->orderBy('id')
            ->get();

        return ApiResponse::success('Productos obtenidos correctamente.', $products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return ApiResponse::success(
            'Producto creado correctamente.',
            $product->load('category:id,name'),
            201
        );
    }

    public function show(Product $product): JsonResponse
    {
        return ApiResponse::success('Producto obtenido correctamente.', $product->load('category:id,name'));
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());

        return ApiResponse::success(
            'Producto actualizado correctamente.',
            $product->refresh()->load('category:id,name')
        );
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete(); // Se conserva el registro y Spatie registra el evento.

        return ApiResponse::success('Producto eliminado correctamente.');
    }
}

