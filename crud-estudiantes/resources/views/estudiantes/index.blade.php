@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nuevo Estudiante
    </a>
</div>

@if($estudiantes->isEmpty())
    <p class="text-gray-500">No hay estudiantes registrados.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Correo</th>
                    <th class="px-4 py-3 text-left">Carrera</th>
                    <th class="px-4 py-3 text-left">Semestre</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $estudiante->id }}</td>
                    <td class="px-4 py-3">{{ $estudiante->nombre }}</td>
                    <td class="px-4 py-3">{{ $estudiante->correo }}</td>
                    <td class="px-4 py-3">{{ $estudiante->carrera->nombre ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $estudiante->semestre }}°</td>
                    <td class="px-4 py-3 text-center flex gap-2 justify-center">
                        <a href="{{ route('estudiantes.edit', $estudiante) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Editar
                        </a>
                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar a {{ $estudiante->nombre }}?')">
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
