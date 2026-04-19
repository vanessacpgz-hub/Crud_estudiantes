@extends('layouts.app')

@section('title', 'Nueva Carrera')

@section('content')
<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h1 class="text-xl font-bold text-gray-800 mb-4">Nueva Carrera</h1>

    <form action="{{ route('carreras.store') }}" method="POST">
        @csrf

        {{-- Nombre --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                          @error('nombre') border-red-500 @enderror">
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Clave --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Clave</label>
            <input type="text" name="clave" value="{{ old('clave') }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                          @error('clave') border-red-500 @enderror">
            @error('clave')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
            <a href="{{ route('carreras.index') }}"
               class="bg-gray-300 text-gray-700 px-5 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
