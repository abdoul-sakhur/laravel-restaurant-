<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'price' => ['required', 'integer'],
            'imageP' => ['required', 'image'],
            'imageS' => ['required', 'image'],
            'imageT' => ['required', 'image'],
            'stock' => ['required'],
            'quality' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            ];
    }
}
