<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    protected $filleable = [
        'titol',
        'descripcion',
        'cartell',
        'duracio',
        'any',
        'director',
    ];
}
