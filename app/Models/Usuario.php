<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $primaryKey = 'id_usuario'; // si no usas "id"

    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
        'tipo_usuario',
        'telefono',
        'fecha_registro'
    ];

    public function residencias()
    {
        return $this->hasMany(Residencia::class, 'id_propietario');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_estudiante');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_estudiante');
    }
}
