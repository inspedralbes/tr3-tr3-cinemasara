<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use App\Http\Controllers\Controller;


class PeliculasController extends Controller
{
    public function getPeliculas(){

        $peliculas = Peliculas::inRandomOrder()->get();
        return response()->json($peliculas);
    }
    public function show($id){

        $pelicula = Peliculas::find($id);
        if($pelicula){
            return response()->json(['error' => 'Pelicula no encontrada'],404);

    }
    return response()->json($pelicula);
    }
}


