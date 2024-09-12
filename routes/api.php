<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // categorias, categorias by id
    Route::get('/categorias',[CategoriaController::class,'index']);
    Route::get('/categorias/{uri}',[CategoriaController::class,'show']);
    
    // productos, productos by id, productos by categoria  
    Route::get('/productos/categoria/{id}',[ProductoController::class,'productosByCategoria']);
    Route::apiResource('productos',ProductoController::class);

    //pedidos
    Route::apiResource('pedidos',PedidoController::class);
    
});


//Auth
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
