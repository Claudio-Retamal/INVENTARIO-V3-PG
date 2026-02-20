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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('numero_serial');
            $table->string('modelo');
            $table->string('marca');
            $table->string('color');
            $table->string('descripcion');
            $table->foreignId('categoria_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sala_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('financiamiento_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('personal_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
