<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de estudiantes.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                           // Nombre completo
            $table->string('correo')->unique();                 // Correo electrónico único
            $table->foreignId('carrera_id')                    // Relación con carreras
                  ->constrained('carreras')
                  ->onDelete('cascade');
            $table->unsignedTinyInteger('semestre');           // Semestre (1-12)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
