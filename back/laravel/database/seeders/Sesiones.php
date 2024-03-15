<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peliculas;
use App\Models\Sesion;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;

class Sesiones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peliculas = Peliculas::pluck('id_pelicula')->toArray();
        shuffle($peliculas);
        

        if(empty($peliculas)){
            $this->command->info('No hay películas en la base de datos');
            return;
        }

        $horaSesion = ['16:00', '18:00', '20:00'];

        for ($dia = 1; $dia <= 7; $dia++) {
   

            $esDiaEspectador = ($dia == Carbon::WEDNESDAY);

            Sesion::create([
                'id_pelicula' => array_shift($peliculas),
                'dia' => $dia,
                'hora' => $horaSesion[array_rand($horaSesion)],
                'diaespectador' => $esDiaEspectador,
            ]);
        }
    }

    public function show(Request $request){
        
    }
}

