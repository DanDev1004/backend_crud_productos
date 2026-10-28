<?php

namespace App\Http\Requests;

use App\Support\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Esta prueba no requiere autenticación; posteriormente se pueden aplicar Policies.
        return true;
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            ApiResponse::error('Los datos enviados no son válidos.', $validator->errors()->toArray(), 422)
        );
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto.',
            'name.max' => 'El nombre no puede superar 150 caracteres.',
            'name.unique' => 'Ya existe una categoría con ese nombre.',
            'description.string' => 'La descripción debe ser texto.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser numérico.',
            'price.gt' => 'El precio debe ser mayor que 0.',
            'price.decimal' => 'El precio puede tener como máximo 2 decimales.',
            'price.max' => 'El precio supera el máximo permitido.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe tener un identificador válido.',
            'category_id.exists' => 'La categoría no existe o fue eliminada.',
        ];
    }
}

