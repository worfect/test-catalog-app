<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

final class BindTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request): array
    {
        return [
            'materialId' => 'required',
            'tagId'  =>  [
                'required',
                Rule::unique('material_tag', 'tag_id')->where(function (Unique $query) use($request): Unique {
                    return $query->where('material_id', (string) $request->get('materialId'))
                                ->where('tag_id', (string) $request->get('tagId'));
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            "tagId.unique" => 'Тег уже привязан к записи',
        ];
    }
}
