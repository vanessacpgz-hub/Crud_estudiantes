<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;

// Redirige la raíz al listado de estudiantes
Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

// CRUD de Carreras
Route::resource('carreras', CarreraController::class)
     ->except(['show']);

// CRUD de Estudiantes
Route::resource('estudiantes', EstudianteController::class)
     ->except(['show']);
