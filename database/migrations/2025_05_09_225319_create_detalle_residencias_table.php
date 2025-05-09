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
        Schema::create('detalle_residencias', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->foreignId('id_residencia')->constrained('residencias', 'id_residencia')->onDelete('cascade');
            $table->integer('habitaciones');
            $table->integer('plazas_totales');
            $table->integer('baños');
            $table->boolean('cocina');
            $table->boolean('sala');
            $table->boolean('wifi');
            $table->boolean('amueblado');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_residencias');
    }
};
