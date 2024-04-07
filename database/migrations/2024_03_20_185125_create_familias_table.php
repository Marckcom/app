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
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personals_id')->references('id')->on('personals')->constrained()->cascadeOnDelete();
            $table->string('vinculo');//madre, padre, hijos, conyuge
            $table->string('name')->nullable();
            $table->string('lastname');

            //En el formulario dividir en caso de hijos hijos estos datos
            $table->date('birthday')->nullable();
            $table->string('certificate_nac')->nullable();//certificado de nacimiento
            $table->string('ci')->nullable();//numero de cedula
            $table->string('foto_ci')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
