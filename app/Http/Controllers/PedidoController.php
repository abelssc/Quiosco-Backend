<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Pedido::all();
        return PedidoResource::collection(Pedido::orderBy('entregado')
                                        ->orderByDesc('created_at')
                                        ->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {   
        DB::beginTransaction();

       try {
            $pedido=Pedido::create([
                'cliente_id' => $request->user()->id
            ]);
            $pedido->asignarProductos($request->productos);
            DB::commit();

            return response()->json([
                'message' => 'Pedido creado con éxito',
                'pedido' => new PedidoResource($pedido)
            ],201);
       } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Error al crear el pedido',
                'error' => $th->getMessage()
            ],500);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return $pedido;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $this->authorize('update', $pedido);

        //solo actualizamos los campos validados en el UpdatePedidoRequest como pagado y entregado
        $pedido->update($request->validated());

        return response()->json([
            'message' => 'Pedido actualizado con éxito',
            'pedido' => new PedidoResource($pedido)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
