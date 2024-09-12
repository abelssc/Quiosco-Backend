<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cliente' => $this->cliente->name,
            'pagado' => $this->pagado,
            'entregado' => $this->entregado,
            'created_at' => $this->created_at->diffForHumans(),
            'productos' => $this->productos->map(function($producto){
                return [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'imagen' => $producto->imagen,
                    'cantidad' => $producto->pivot->cantidad,
                    'precio' => $producto->pivot->precio
                ];
            })
        ];
    }
}
