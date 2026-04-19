@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h1 class="text-xl font-bold text-gray-800 mb-4">Editar Estudiante</h1>

    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                          @error('nombre') border-red-500 @enderror">
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Correo --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Correo</label>
            <input type="email" name="correo" value="{{ old('correo', $estudiante->correo) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                          @error('correo') border-red-500 @enderror">
            @error('correo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Carrera --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Carrera</label>
            <select name="carrera_id"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('carrera_id') border-red-500 @enderror">
                <option value="">-- Selecciona una carrera --</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}"
                        {{ old('carrera_id', $estudiante->carrera_id) == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }} ({{ $carrera->clave }})
                    </option>
                @endforeach
            </select>
            @error('carrera_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Semestre --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Semestre</label>
            <input type="number" name="semestre" value="{{ old('semestre', $estudiante->semestre) }}"
                   min="1" max="12"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                          @error('semestre') border-red-500 @enderror">
            @error('semestre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Actualizar
            </button>
            <a href="{{ route('estudiantes.index') }}"
               class="bg-gray-300 text-gray-700 px-5 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
