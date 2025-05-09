<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    protected $primaryKey = 'id_reserva';

    protected $fillable = [
        'id_estudiante',
        'id_residencia',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Usuario::class, 'id_estudiante');
    }

    public function residencia()
    {
        return $this->belongsTo(Residencia::class, 'id_residencia');
    }
}
