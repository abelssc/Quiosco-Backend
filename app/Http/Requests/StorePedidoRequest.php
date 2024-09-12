<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
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
        // el campo cliente_id no se envia desde el front-end ya que se obtiene del usuario autenticado por medio del token
        return [
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ];
    }
    public function messages():array{
        return [
            'productos.required' => 'El campo productos es obligatorio',
            'productos.array' => 'El campo productos debe ser un arreglo',
            'productos.*.id.required' => 'El campo id es obligatorio',
            'productos.*.id.exists' => 'El producto seleccionado no existe',
            'productos.*.cantidad.required' => 'El campo cantidad es obligatorio',
            'productos.*.cantidad.integer' => 'El campo cantidad debe ser un número entero',
            'productos.*.cantidad.min' => 'El campo cantidad debe ser mayor a 0',
            'productos.*.precio.required' => 'El campo precio es obligatorio',
            'productos.*.precio.decimal' => 'El campo precio debe ser un número decimal',
            'productos.*.precio.min' => 'El campo precio debe ser mayor o igual a 0',
        ];
    }
}
