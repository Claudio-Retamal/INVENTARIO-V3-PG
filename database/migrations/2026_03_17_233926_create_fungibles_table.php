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
        Schema::create('fungibles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->foreignId('categoria_fungible_id')->constrained()->cascadeOnDelete();
            $table->string('unidad_medida'); // unidad, caja, ml
            $table->integer('stock_actual')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungibles');
    }
};
