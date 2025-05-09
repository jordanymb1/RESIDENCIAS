<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleResidencia extends Model
{

    protected $table = 'detalle_residencias';
    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'id_residencia',
        'habitaciones',
        'plazas_totales',
        'baños',
        'cocina',
        'sala',
        'wifi',
        'amueblado',
        'descripcion'
    ];

    public function residencia()
    {
        return $this->belongsTo(Residencia::class, 'id_residencia');
    }
}
