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
        Schema::create('movimiento_fungibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungible_id')->constrained();
            $table->foreignId('sala_id')->constrained();
            $table->enum('tipo', ['entrada', 'salida']);
            $table->integer('cantidad');
            $table->text('motivo')->nullable();
            $table->foreignId('personal_id')->constrained();
            $table->dateTime('fecha_movimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_fungibles');
    }
};
