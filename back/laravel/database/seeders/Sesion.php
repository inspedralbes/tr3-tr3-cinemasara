<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peliculas;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\Sesion;


class Sesion extends Seeder
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

        for($i = 0; $i < 3; $i++){
            $fechaActual= $fechaActual->addDays($i);
            $horaSession = Carbon::createFromTime(14, 0)->addMinutes(0,420);
            $diaEspectador = $fechaActual->dayOfWeek === 3 ? true : false;

            Sesion::create([
                'id_pelicula' => $peliculas->random(),
                'dia' => $fechaActual,
                'hora' => $horaSession,
                'diaespectador' => $diaEspectador
            ]);
        }
    }

    private function randomDayofWeek(){
        $randomNum = rand(0,3);
        return $randomNum === 3 ? true : false;
    }
}
