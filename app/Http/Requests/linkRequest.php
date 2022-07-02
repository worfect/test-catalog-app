<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

final class linkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => 'required|url',
        ];
    }

    public function messages(): array
    {
        return [
            "url.url" => 'Тут должна быть ссылка',
            "url.required" => 'Поле обязательно для заполнения',
        ];
    }
}
