<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;

class SesionController extends Controller
{
    // public function getSesiones(){
    //     $sesion = Sesion::all();
    //     return response()->json($sesion);
    // }

    // public function store(Request $request){
    //     $sesion = new Sesion();
    //     $sesion->id_pelicula = $request->session()->put('id_pelicula', $request->id_pelicula);
    //     $sesion->dia = \Carbon\Carbon::parse($request->dia);
    //     $sesion->$request->hora;
    //     $sesion->diaespectador = $request->diaespectador;
    //     $sesion->save();
    //     return response()->json($sesion);
    // }
}
