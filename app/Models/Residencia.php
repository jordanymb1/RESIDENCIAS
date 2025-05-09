<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{

    protected $primaryKey = 'id_residencia';

    protected $fillable = [
        'id_propietario',
        'nombre',
        'ubicacion',
        'precio_mensual',
        'disponibilidad'
    ];

    public function propietario()
    {
        return $this->belongsTo(Usuario::class, 'id_propietario');
    }

    public function detalle()
    {
        return $this->hasOne(DetalleResidencia::class, 'id_residencia');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_residencia');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_residencia');
    }
}
