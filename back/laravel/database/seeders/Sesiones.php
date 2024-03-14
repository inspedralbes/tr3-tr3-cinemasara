<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peliculas;
use App\Models\Sesion;
use Carbon\Carbon;

class Sesiones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peliculas = Peliculas::pluck('id_pelicula');

        if($peliculas->isEmpty()){
            $this->command->info('No hay peliculas en la base de datos');
            return;
        }


        $fechaActual = Carbon::now();
        $diaespectador = 3;

        Sesion::create([
            'id_pelicula' => $peliculas->random(),
            'dia' => $diaespectador,
            'hora' => Carbon::createFromTime(14,0)->format('H:i:s'),
            'diaespectador' => 1,
        ]);

        for($i = 0; $i < 7; $i++){
            if($i + 1 == $diaespectador){
                continue;
            }
        }

        $horaSesion = Carbon::createFromTime(14,0);
        Sesion::create([
            'id_pelicula' => $peliculas->random(),
            'dia' => $i + 1,
            'hora' => $horaSesion->format('H:i:s'),
            'diaespectador' => 0,
        ]);
    } 
}

