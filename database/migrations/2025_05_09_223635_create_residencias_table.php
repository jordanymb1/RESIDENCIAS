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
        Schema::create('residencias', function (Blueprint $table) {
            $table->id('id_residencia');
            $table->foreignId('id_propietario')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('ubicacion', 255);
            $table->decimal('precio_mensual', 10, 2);
            $table->boolean('disponibilidad')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residencias');
    }
};
