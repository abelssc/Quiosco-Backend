<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'pagado', 'entregado'];

    public function cliente(){
        return $this->belongsTo(User::class, 'cliente_id', 'id');
    }

    public function productos():BelongsToMany{
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'precio');
    }

    public function asignarProductos(array $productos){
        $formatedproductos = [];
            foreach ($productos as $producto) {
                $formatedproductos[$producto['id']] = [
                    'cantidad' => $producto['cantidad'],
                    'precio' => $producto['precio'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        $this->productos()->attach($formatedproductos);
    }
}
