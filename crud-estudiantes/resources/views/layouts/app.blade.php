<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Estudiantes')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Barra de navegación --}}
    <nav class="bg-blue-700 text-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <span class="font-bold text-lg">🎓 CRUD Estudiantes</span>
            <div class="flex gap-4">
                <a href="{{ route('estudiantes.index') }}"
                   class="hover:underline {{ request()->routeIs('estudiantes.*') ? 'font-bold underline' : '' }}">
                    Estudiantes
                </a>
                <a href="{{ route('carreras.index') }}"
                   class="hover:underline {{ request()->routeIs('carreras.*') ? 'font-bold underline' : '' }}">
                    Carreras
                </a>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="max-w-5xl mx-auto px-4 py-8">

        {{-- Mensajes de éxito --}}
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Mensajes de error --}}
        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded">
                ❌ {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
