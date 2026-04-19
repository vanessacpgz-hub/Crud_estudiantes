<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    // Campos asignables en masa
    protected $fillable = ['nombre', 'correo', 'carrera_id', 'semestre'];

    /**
     * Un estudiante pertenece a una carrera.
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
