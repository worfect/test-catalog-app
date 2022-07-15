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
            'title' => ['required', Rule::unique('tags')->ignore($this['tag']->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => trans('validation.required'),
            'title.unique' => trans('validation.unique'),
        ];
    }
}
