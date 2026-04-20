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
        Schema::create('detalle_recambio_tintas', function (Blueprint $table) {
            $table->foreignId('recambio_id')
                ->constrained('recambio_tintas')
                ->cascadeOnDelete();

            $table->foreignId('fungible_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('cantidad_usada')->default(1); // 👈 mejor que stock_actualizado
            $table->string('color')->nullable(); // opcional pero útil

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_recambio_tintas');
    }
};
