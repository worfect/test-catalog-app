<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:categories,title',
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
