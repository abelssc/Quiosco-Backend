<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return ProductoResource::collection(Producto::all()->sortByDesc('categoria_id'));
    }
    public function show($id)
    {
        return new ProductoResource(Producto::find($id));
    }
    public function productosByCategoria($id)
    {
        // $categoria = Categoria::find($id);
        // return ProductoResource::collection($categoria->productos);

        return ProductoResource::collection(Producto::where('categoria_id',$id)->where('estado',1)->get());
    }
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        // call policy
        $this->authorize('update', $producto);
        
        $producto->update($request->validated());
        return response()->json([
            'message' => 'Producto actualizado con éxito',
            'producto' => new ProductoResource($producto)
        ],200);
    }
}
