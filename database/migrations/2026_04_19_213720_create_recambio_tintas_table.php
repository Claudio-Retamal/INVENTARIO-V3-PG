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
        Schema::create('recambio_tintas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungible_id')->constrained()->cascadeOnDelete();
            $table->foreignId('equipo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('personal_id')->constrained()->cascadeOnDelete();
            $table->string('tipo_consumible');
            $table->integer('cantidad_usada')->default(1);
            $table->string('color')->nullable(); // 👈 cambio clave
            $table->string('observacion')->nullable();
            $table->date('fecha_recambio');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('recambio_tintas');
    }
};
