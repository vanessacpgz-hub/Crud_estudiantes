@extends('layouts.app')

@section('title', 'Carreras')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Carreras</h1>
    <a href="{{ route('carreras.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nueva Carrera
    </a>
</div>

@if($carreras->isEmpty())
    <p class="text-gray-500">No hay carreras registradas.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Clave</th>
                    <th class="px-4 py-3 text-left">Estudiantes</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carreras as $carrera)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $carrera->id }}</td>
                    <td class="px-4 py-3">{{ $carrera->nombre }}</td>
                    <td class="px-4 py-3">{{ $carrera->clave }}</td>
                    <td class="px-4 py-3">{{ $carrera->estudiantes()->count() }}</td>
                    <td class="px-4 py-3 text-center flex gap-2 justify-center">
                        <a href="{{ route('carreras.edit', $carrera) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Editar
                        </a>
                        <form action="{{ route('carreras.destroy', $carrera) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar esta carrera?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
