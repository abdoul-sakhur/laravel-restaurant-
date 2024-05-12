<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Commanderequest extends FormRequest
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
            'nom_client' => ['required', 'min:2'],
            'telephone_client' => ['required'],
            'adresse' => ['required'],
            'plats' => ['required'],
            'prix_total' => ['required'],
            'vendu' => ['boolean'],
        ];
    }
}
