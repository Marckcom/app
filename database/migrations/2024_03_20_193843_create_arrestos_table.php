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
        Schema::create('arrestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personals_id')->references('id')->on('personals')->constrained()->cascadeOnDelete();
            $table->string('asunto');//motivo del arresto
            $table->string('autoridad');//autoridad que solicita el arresto
            $table->string('body');//copiar la redaccion del arresto
            $table->string('duracion');//sansion aplicada
            $table->string('documento');//documento por el cual se arresta
            $table->string('image');//foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrestos');
    }
};
