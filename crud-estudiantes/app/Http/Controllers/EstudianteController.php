<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Lista todos los estudiantes con su carrera.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Muestra el formulario para registrar un estudiante.
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    /**
     * Guarda un nuevo estudiante en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:100',
            'correo'     => 'required|email|unique:estudiantes,correo',
            'carrera_id' => 'required|exists:carreras,id',
            'semestre'   => 'required|integer|min:1|max:12',
        ], [
            'nombre.required'     => 'El nombre es obligatorio.',
            'correo.required'     => 'El correo es obligatorio.',
            'correo.email'        => 'El correo no tiene un formato válido.',
            'correo.unique'       => 'Ya existe un estudiante con ese correo.',
            'carrera_id.required' => 'Debes seleccionar una carrera.',
            'carrera_id.exists'   => 'La carrera seleccionada no existe.',
            'semestre.required'   => 'El semestre es obligatorio.',
            'semestre.min'        => 'El semestre mínimo es 1.',
            'semestre.max'        => 'El semestre máximo es 12.',
        ]);

        Estudiante::create($request->only('nombre', 'correo', 'carrera_id', 'semestre'));

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante registrado correctamente.');
    }

    /**
     * Muestra el formulario para editar un estudiante.
     */
    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    /**
     * Actualiza los datos de un estudiante.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre'     => 'required|string|max:100',
            'correo'     => 'required|email|unique:estudiantes,correo,' . $estudiante->id,
            'carrera_id' => 'required|exists:carreras,id',
            'semestre'   => 'required|integer|min:1|max:12',
        ], [
            'nombre.required'     => 'El nombre es obligatorio.',
            'correo.required'     => 'El correo es obligatorio.',
            'correo.email'        => 'El correo no tiene un formato válido.',
            'correo.unique'       => 'Ya existe un estudiante con ese correo.',
            'carrera_id.required' => 'Debes seleccionar una carrera.',
            'semestre.required'   => 'El semestre es obligatorio.',
            'semestre.min'        => 'El semestre mínimo es 1.',
            'semestre.max'        => 'El semestre máximo es 12.',
        ]);

        $estudiante->update($request->only('nombre', 'correo', 'carrera_id', 'semestre'));

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Elimina un estudiante de la base de datos.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
}
