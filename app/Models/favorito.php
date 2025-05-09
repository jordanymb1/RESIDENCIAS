<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{

    protected $primaryKey = null;
    public $incrementing = false;
    protected $table = 'favoritos';

    protected $fillable = ['id_estudiante', 'id_residencia'];

    public function estudiante()
    {
        return $this->belongsTo(Usuario::class, 'id_estudiante');
    }

    public function residencia()
    {
        return $this->belongsTo(Residencia::class, 'id_residencia');
    }
}
