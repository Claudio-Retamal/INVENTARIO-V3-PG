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
        Schema::create('historial_prestacions', function (Blueprint $table) {
            $table->dateTime('fecha_prestacion');
            $table->dateTime('fecha_devolucion');
            $table->foreignId('personal_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cargo_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sala_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('equipo_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_prestacions');
    }
};
