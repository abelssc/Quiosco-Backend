<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        // return response()->json(Categoria::all());
        return CategoriaResource::collection(Categoria::all());
    }
    public function show($uri){
        return new CategoriaResource(Categoria::where('uri',$uri)->first());
    }
}
