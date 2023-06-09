<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'label' => 'required|string|max:191',
        ];
    }
}
