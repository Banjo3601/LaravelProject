<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:191',
            'year' => 'required|numeric',
            'author' => 'required|string|max:191',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
