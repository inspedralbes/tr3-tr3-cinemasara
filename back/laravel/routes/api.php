<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;
use Illuminate\Support\Facades\DB;
use App\Models\Sesion;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/peliculas', [PeliculasController::class, 'getPeliculas']);
Route::get('/sesiones', function (){
    $sesiones = DB::table('sesion')
    ->join('peliculas', 'sesion.id_pelicula', '=', 'peliculas.id_pelicula')
    ->select('sesion.*', 'peliculas.titol')
    ->get();
    return response()->json($sesiones);
});
Route::get('/sesiones/{id_sesion}', function ($id_sesion){
    $sesion = DB::table('sesion')
        ->join('peliculas', 'sesion.id_pelicula', '=', 'peliculas.id_pelicula')
        ->select('sesion.*', 'peliculas.titol')
        ->where('id_sesion', $id_sesion)
        ->first();
        if(!$sesion){
            return response()->json(['error' => 'Sesión no encontrada'],404);
        }
        return response()->json($sesion);
    
});

