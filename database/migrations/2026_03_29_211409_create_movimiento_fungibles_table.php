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
            $table->enum('tipo', ['entrada', 'salida', 'ajuste']);
            $table->date('fecha');
            $table->foreignId('fungible_id')->constrained()->cascadeOnDelete();
            $table->foreignId('personal_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sala_id')->constrained()->cascadeOnDelete();
            $table->integer('cantidad');
            // Stock antes y después (MUY importante)
            $table->integer('stock_anterior');
            $table->integer('stock_actual');
            $table->string('motivo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimiento_fungibles');
    }
};
