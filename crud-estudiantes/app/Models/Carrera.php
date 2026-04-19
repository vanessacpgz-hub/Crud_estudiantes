<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    // Campos asignables en masa
    protected $fillable = ['nombre', 'clave'];

    /**
     * Una carrera tiene muchos estudiantes.
     */
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
