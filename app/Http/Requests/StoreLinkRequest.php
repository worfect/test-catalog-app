<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreLinkRequest extends FormRequest
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
            'url.url' => trans('validation.url'),
            'url.required' => trans('validation.required'),
        ];
    }
}
