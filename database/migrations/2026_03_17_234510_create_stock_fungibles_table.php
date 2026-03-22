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
        Schema::create('stock_fungibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungible_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bodega_id')->constrained()->cascadeOnDelete();
            $table->integer('cantidad')->default(0);
            $table->timestamps();

            $table->unique(['fungible_id', 'bodega_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_fungibles');
    }
};
