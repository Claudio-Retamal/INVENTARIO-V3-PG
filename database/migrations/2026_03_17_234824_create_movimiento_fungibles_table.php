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
        Schema::create('movimiento__fungibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungible_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bodega_id')->constrained()->cascadeOnDelete();

            $table->enum('tipo', ['entrada', 'salida', 'ajuste']);
            $table->integer('cantidad');

            $table->string('motivo')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamp('fecha_movimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento__fungibles');
    }
};
