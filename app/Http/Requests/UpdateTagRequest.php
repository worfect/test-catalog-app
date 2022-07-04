<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('tags')->ignore($this['id'])],
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
