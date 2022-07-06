<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreMaterialRequest extends FormRequest
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
            'title' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'typeId.required' => trans('validation.required'),
            'categoryId.required' => trans('validation.required'),
            'title.required' => trans('validation.required'),
        ];
    }
}
