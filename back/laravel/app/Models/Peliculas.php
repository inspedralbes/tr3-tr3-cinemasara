<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelicula';

    protected $fillable = [
        'titol',
        'descripcio',
        'cartell',
        'duracio',
        'any',
        'director',
    ];

    public function sesiones(){
        return $this->hasMany(Sesion::class, 'id_pelicula');
    }
}
