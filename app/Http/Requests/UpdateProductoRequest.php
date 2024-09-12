<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'estado'=> ['required','boolean'],
        ];
    }
    public function messages()
    {
        return [
            'estado.required' => 'El estado es requerido',
            'estado.boolean' => 'El estado debe ser un valor booleano',
        ];
    }
}
