<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;

class EntradasControllers extends Controller
{
    public function index(){
        $entradas = Entradas::all();
        return response()->json($entradas);
    }

    public function show($id_entrada){
        $entradas = Entradas::all()->where('id_entrada', $id_entrada)->first();
        if(!$entradas){
            return response()->json(['error' => 'Entrada no encontrada'],404);
        }
        return response()->json($entradas);
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'id_sesion' => 'required',
            'fila' => 'required',
            'columna' => 'required',
            'preu' => 'required',
        ]);
        $entrada = Entradas::create($data);
        return response()->json($entrada, 201);
    }


}
