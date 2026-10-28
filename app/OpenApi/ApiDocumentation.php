<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'API CRUD Productos y Categorías',
    version: '1.0.0',
    description: 'API REST en Laravel para gestionar productos y categorías.'
)]
#[OA\Server(url: 'http://localhost:8000', description: 'Servidor local')]
class ApiDocumentation
{
    // ===================== CATEGORÍAS =====================

    #[OA\Get(
        path: '/api/categories',
        summary: 'Listar categorías',
        tags: ['Categorías'],
        responses: [
            new OA\Response(response: 200, description: 'Categorías obtenidas correctamente', content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'success', type: 'boolean', example: true),
                    new OA\Property(property: 'message', type: 'string', example: 'Categorías obtenidas correctamente.'),
                    new OA\Property(property: 'data', type: 'array', items: new OA\Items(type: 'object')),
                ]
            )),
        ]
    )]
    public function listCategories(): void {}

    #[OA\Post(
        path: '/api/categories',
        summary: 'Crear categoría',
        tags: ['Categorías'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 150, example: 'Ropa'),
                    new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Prendas y accesorios'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: 'Categoría creada correctamente'),
            new OA\Response(response: 422, description: 'Error de validación (nombre requerido o duplicado)'),
        ]
    )]
    public function createCategory(): void {}

    #[OA\Get(
        path: '/api/categories/{category}',
        summary: 'Obtener categoría por ID',
        tags: ['Categorías'],
        parameters: [
            new OA\Parameter(name: 'category', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Categoría obtenida correctamente'),
            new OA\Response(response: 404, description: 'Categoría no encontrada'),
        ]
    )]
    public function showCategory(): void {}

    #[OA\Put(
        path: '/api/categories/{category}',
        summary: 'Actualizar categoría',
        description: 'También admite PATCH con la misma ruta.',
        tags: ['Categorías'],
        parameters: [
            new OA\Parameter(name: 'category', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 150, example: 'Ropa deportiva'),
                    new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Nueva descripción'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: 'Categoría actualizada correctamente'),
            new OA\Response(response: 404, description: 'Categoría no encontrada'),
            new OA\Response(response: 422, description: 'Error de validación'),
        ]
    )]
    public function updateCategory(): void {}

    #[OA\Delete(
        path: '/api/categories/{category}',
        summary: 'Eliminar categoría (borrado lógico)',
        tags: ['Categorías'],
        parameters: [
            new OA\Parameter(name: 'category', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Categoría eliminada correctamente'),
            new OA\Response(response: 404, description: 'Categoría no encontrada'),
        ]
    )]
    public function deleteCategory(): void {}

    // ====================== PRODUCTOS ======================

    #[OA\Get(
        path: '/api/products',
        summary: 'Listar productos',
        tags: ['Productos'],
        responses: [
            new OA\Response(response: 200, description: 'Productos obtenidos correctamente', content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'success', type: 'boolean', example: true),
                    new OA\Property(property: 'message', type: 'string', example: 'Productos obtenidos correctamente.'),
                    new OA\Property(property: 'data', type: 'array', items: new OA\Items(type: 'object')),
                ]
            )),
        ]
    )]
    public function listProducts(): void {}

    #[OA\Post(
        path: '/api/products',
        summary: 'Crear producto',
        tags: ['Productos'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name', 'price', 'stock', 'category_id'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 150, example: 'Camiseta Overskull'),
                    new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Camiseta negra edición limitada'),
                    new OA\Property(property: 'price', type: 'number', format: 'double', minimum: 0.01, example: 89.90),
                    new OA\Property(property: 'stock', type: 'integer', minimum: 0, example: 50),
                    new OA\Property(property: 'category_id', type: 'integer', minimum: 1, example: 1),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: 'Producto creado correctamente'),
            new OA\Response(response: 422, description: 'Error de validación'),
        ]
    )]
    public function createProduct(): void {}

    #[OA\Get(
        path: '/api/products/{product}',
        summary: 'Obtener producto por ID',
        tags: ['Productos'],
        parameters: [
            new OA\Parameter(name: 'product', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Producto obtenido correctamente'),
            new OA\Response(response: 404, description: 'Producto no encontrado'),
        ]
    )]
    public function showProduct(): void {}

    #[OA\Put(
        path: '/api/products/{product}',
        summary: 'Actualizar producto',
        description: 'También admite PATCH con la misma ruta.',
        tags: ['Productos'],
        parameters: [
            new OA\Parameter(name: 'product', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 150, example: 'Camiseta Overskull Premium'),
                    new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Edición especial'),
                    new OA\Property(property: 'price', type: 'number', format: 'double', minimum: 0.01, example: 99.90),
                    new OA\Property(property: 'stock', type: 'integer', minimum: 0, example: 25),
                    new OA\Property(property: 'category_id', type: 'integer', minimum: 1, example: 1),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: 'Producto actualizado correctamente'),
            new OA\Response(response: 404, description: 'Producto no encontrado'),
            new OA\Response(response: 422, description: 'Error de validación'),
        ]
    )]
    public function updateProduct(): void {}

    #[OA\Delete(
        path: '/api/products/{product}',
        summary: 'Eliminar producto (borrado lógico)',
        tags: ['Productos'],
        parameters: [
            new OA\Parameter(name: 'product', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Producto eliminado correctamente'),
            new OA\Response(response: 404, description: 'Producto no encontrado'),
        ]
    )]
    public function deleteProduct(): void {}
}
