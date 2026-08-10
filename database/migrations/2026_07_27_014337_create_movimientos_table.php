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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_movimiento');
            $table->integer('cantidad');
            $table->unsignedBigInteger('insumos_id');
            $table->foreign('insumos_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->unsignedBigInteger('personals_id');
            $table->foreign('personals_id')->references('id')->on('personals')->onDelete('cascade');
            $table->unsignedBigInteger('impresoras_id');
            $table->foreign('impresoras_id')->references('id')->on('impresoras')->onDelete('cascade');
            $table->date('fecha_movimiento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
