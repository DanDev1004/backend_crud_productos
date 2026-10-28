<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'sometimes', 'required', 'string', 'max:150',
                Rule::unique('categories', 'name')->ignore($this->route('category')->getKey()),
            ],
            'description' => ['sometimes', 'nullable', 'string'],
        ];
    }
}

