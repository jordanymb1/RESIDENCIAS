<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->foreignId('id_estudiante')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->foreignId('id_residencia')->constrained('residencias', 'id_residencia')->onDelete('cascade');
            $table->primary(['id_estudiante', 'id_residencia']); // clave compuesta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
