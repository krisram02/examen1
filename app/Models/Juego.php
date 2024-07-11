<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $fillable = [
        'nombre',
        'cantidad_jugadores',
        'juego_de_cartas',
    ];

    public function apuestas()
    {
        return $this->hasMany(Apuesta::class, 'id_juego');
    }
}