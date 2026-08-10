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
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_inicial');
            $table->integer('stock_actual');
            $table->unsignedBigInteger('insumos_id');
            $table->foreign('insumos_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
