<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;

class SesionController extends Controller
{
    public function index(){
        $sesiones = Sesion::all();
        return response()->json($sesiones);
    }

    public function show($id_sesion){
        $sesiones = Sesion::all()->where('id_sesion', $id_sesion)->first();
        if(!$sesiones){
            return response()->json(['error' => 'Sesión no encontrada'],404);
        }
        return response()->json($sesiones);
    }
}
