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
            $this->command->info('No hay películas en la base de datos');
            return;
        }

        $diaActual = Carbon::now()->dayOfWeek;

        for ($dia = 1; $dia <= 7; $dia++) {
   
            $horaSesion = Carbon::createFromTime(16, 0)->format('H:i:s');

            $esDiaEspectador = ($dia == Carbon::WEDNESDAY);

            Sesion::create([
                'id_pelicula' => $peliculas->random(),
                'dia' => $dia,
                'hora' => $horaSesion,
                'diaespectador' => $esDiaEspectador,
            ]);
        }
    }
}

