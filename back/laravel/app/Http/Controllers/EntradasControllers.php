<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EntradasControllers extends Controller
{
    public function index(){
        $entradas = Entradas::all();
        return response()->json($entradas);
    }

    public function show($id_entrada){
        $entradas = Entradas::all()->where('id_entradas', $id_entrada)->first();
        if(!$entradas){
            return response()->json(['error' => 'Entrada no encontrada'],404);
        }
        return response()->json($entradas);
    }

    public function store(Request $request){
        $data = $request->json()->all();
        
        for ($i=0; $i <count($data); $i++) { 
            $validator = Validator::make($data[$i],[
                'id_sesion' => 'required|exists:sesion,id_sesion',
                'fila' => 'required|integer',
                'columna' => 'required|integer',
                'preu' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        }
        for($i=0; $i<count($data); $i++){
            $entrada = Entradas::create($data[$i]);
        }

        return response()->json($entrada, 201);
    }


}
