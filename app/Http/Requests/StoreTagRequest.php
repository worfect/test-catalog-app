<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:tags,title',
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => 'Пожалуйста, заполните поле',
            "title.unique" => 'Такой тег уже существует',
        ];
    }
}
