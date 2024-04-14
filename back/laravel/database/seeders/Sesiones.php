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
        // Obtener todas las películas de la base de datos
        $peliculas = Peliculas::pluck('id_pelicula')->toArray();
        shuffle($peliculas);

        if(empty($peliculas)){
            $this->command->info('No hay películas en la base de datos');
            return;
        }

        // Establecer el día actual como el primer día de las sesiones
        $diaActualSesion = Carbon::now();
        $horaSesion = ['16:00', '18:00', '20:00'];

        foreach($peliculas as $peliculaId){

            $diaSesion = $diaActualSesion->copy(); // Clonar la fecha actual
            for ($dia = 1; $dia <= 7; $dia++) {
                $esDiaEspectador = ($diaSesion->dayOfWeek === Carbon::WEDNESDAY); // Comprobar si es miércoles

                // Crear una nueva sesión para esta película en el día actual
                Sesion::create([
                    'id_pelicula' => $peliculaId,
                    'dia' =>$diaSesion->toDateString(), // Usar la fecha actual
                    'hora' => $horaSesion[array_rand($horaSesion)],
                    'diaespectador' => $esDiaEspectador,
                ]);

                // Avanzar al siguiente día para la próxima sesión
                $diaSesion->addDay();
            }
        }
    }
}

