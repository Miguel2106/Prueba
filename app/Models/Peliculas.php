<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    protected $fillable = [
        'Nombre',
        'FechaDePublicacion',
        'Estado',
        'Foto'
    ];
}
