<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'typeId' => 'required',
            'categoryId' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            "typeId.required" => 'Пожалуйста, заполните поле',
            "categoryId.required" => 'Пожалуйста, заполните поле',
        ];
    }
}
