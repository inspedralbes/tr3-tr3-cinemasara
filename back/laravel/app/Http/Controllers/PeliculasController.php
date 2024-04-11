<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use App\Models\Sesion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function store(Request $request){
        $pelicula = new Peliculas();
        $pelicula->titol = $request->titol;
        $pelicula->descripcio = $request->descripcio;
        $pelicula->cartell = $request->cartell;
        $pelicula->duracio = $request->duracio;
        $pelicula->any = $request->any;
        $pelicula->director = $request->director;
        $pelicula->save();
        return response()->json($pelicula);
    }

    public function update(Request $request, $id_pelicula){
        
        $pelicula = Peliculas::find($id_pelicula);

        if(!$pelicula){
            return response()->json(['error' => 'Pelicula no encontrada'],404);
        }
        $pelicula->update($request->all());
        return response()->json($pelicula,200);
    }

    public function destroy(Request $request, $id_pelicula){
        
        $pelicula = Peliculas::where('id_pelicula', $id_pelicula)->first();
        if(!$pelicula){
            return response()->json(['error' => 'Pelicula no encontrada'],404);
        }
    
        //Eliminamos las sesiones asociadas a la pelicula
        DB::table('sesion')->where('id_pelicula', $id_pelicula)->delete();
            
        $pelicula->delete();
    
        return response()->json(['message' => 'Pelicula eliminada correctamente ']);
    }
}


