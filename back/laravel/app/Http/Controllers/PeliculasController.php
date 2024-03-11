<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peliculas;
class PeliculaController extends Controller
{
    public function getPeliculas(){

        $peliculas = Peliculas::all();
        return $peliculas;
    }

    public function createPeliculas(Request $request){
        
        $pelicula = new Peliculas;

        $pelicula->title = $request->title;
        $pelicula-> descripcion = $request->descripcion;
        $pelicula->cartell = $request->cartell;
        $pelicula->genere = $request->genere;
        $pelicula->duracio = $request->duracio;

        $new =$request->cartell . '_'. $request->title . '.jpg';
        $src = $request->file('img')->storeAs('imagen', $new, [ 'disk' => 'peliculs']);
        $src->imatge = $src;
        $pelicula->save();
        session()->put("peliculas", Peliculas::all());
        session()->save();
        return redirect()->route("peliculas");
    }
}


