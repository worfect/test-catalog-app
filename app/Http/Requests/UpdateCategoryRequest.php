<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('categories')->ignore($this['id'])],
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => 'Пожалуйста, заполните поле',
            "title.unique" => 'Такая категория уже существует',
        ];
    }
}
