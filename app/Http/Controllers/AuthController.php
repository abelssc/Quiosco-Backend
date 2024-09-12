<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        //retornar token y usuario
        return response()->json([
            'user'=> $user,
            'token' => $user->createToken('token')->plainTextToken
        ]);

    }
    public function login(LoginRequest $request){
        if(!auth()->attempt($request->only('email','password'))){
            return response()->json([
                'message'=>'Credenciales incorrectas'
            ],401);
        }
        return response()->json([
            'token'=>$request->user()->createToken('token')->plainTextToken,
            'user'=>$request->user()
        ]);
    }
    public function logout(Request $request){
        //REQUEST PUEDE OBTENER EL USUARIO AUTENTICADO A TRAVES DE LA CABECERA DE AUTORIZACION
        //AL usar currentAccessToken() se obtiene el token actual del usuario autenticado
        //delete() elimina el token actual  del usuario autenticado
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Token eliminado'
        ]); 
    }
}
