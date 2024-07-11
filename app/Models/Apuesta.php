<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apuesta extends Model
{
    protected $fillable = [
        'id_juego',
        'fecha',
        'monto',
    ];

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego');
    }
}
