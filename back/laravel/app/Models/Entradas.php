<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    use HasFactory;
protected $fillable = ['id_sesion', 'fila', 'columna', 'preu', 'email'];
}
