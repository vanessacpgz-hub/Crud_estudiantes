<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Lista todas las carreras.
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Muestra el formulario para crear una carrera.
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Guarda una nueva carrera en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'clave'  => 'required|string|max:20|unique:carreras,clave',
        ], [
            'nombre.required' => 'El nombre de la carrera es obligatorio.',
            'clave.required'  => 'La clave de la carrera es obligatoria.',
            'clave.unique'    => 'Ya existe una carrera con esa clave.',
        ]);

        Carrera::create($request->only('nombre', 'clave'));

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera registrada correctamente.');
    }

    /**
     * Muestra el formulario para editar una carrera.
     */
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Actualiza los datos de una carrera.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'clave'  => 'required|string|max:20|unique:carreras,clave,' . $carrera->id,
        ], [
            'nombre.required' => 'El nombre de la carrera es obligatorio.',
            'clave.required'  => 'La clave de la carrera es obligatoria.',
            'clave.unique'    => 'Ya existe una carrera con esa clave.',
        ]);

        $carrera->update($request->only('nombre', 'clave'));

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera actualizada correctamente.');
    }

    /**
     * Elimina una carrera de la base de datos.
     */
    public function destroy(Carrera $carrera)
    {
        // Verificar si tiene estudiantes asociados
        if ($carrera->estudiantes()->count() > 0) {
            return redirect()->route('carreras.index')
                             ->with('error', 'No se puede eliminar: la carrera tiene estudiantes asignados.');
        }

        $carrera->delete();

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera eliminada correctamente.');
    }
}
