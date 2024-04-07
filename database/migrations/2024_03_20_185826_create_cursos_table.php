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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('personals_id')->references('id')->on('personals')->constrained()->cascadeOnDelete();
            $table->string('tipe');//militar o civil
            $table->string('institucion');//realizado en ESCUELA DE INFANTERIA
            $table->string('duracion');//duracion del curso
            $table->string('documento');//por el cual se realiza el curso
            $table->string('file');//por el cual se realiza el llamado al curso 
            $table->string('certificate');//foto del titulo o certificado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
