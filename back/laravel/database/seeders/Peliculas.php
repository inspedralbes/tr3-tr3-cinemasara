<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Peliculas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = public_path('peliculas.json');
        if(File::exists($filePath)){
            $data = json_decode(File::get($filePath), true);

            foreach($data['peliculas'] as $item){
                DB::table('peliculas')->insert([
                    'titol' => $item['titol'],
                    'descripcion' => $item['descripcio'],
                    'cartell' => $item['cartell'],
                    'duracio' => $item['duracio'],
                    'any' => $item['any'],
                    'director' => $item['director'],
                ]);
            }
        }else{
            echo "No se ha encontrado el archivo peliculas.json";
        }
    }
}
