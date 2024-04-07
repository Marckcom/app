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
        Schema::create('reposos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personals_id')->references('id')->on('personals')->constrained()->cascadeOnDelete();
            $table->string('dx');
            $table->string('desde');//desde cuando empieza su reposo
            $table->string('hasta');//hasta cuando termina su reposo
            $table->string('duracion');//duracion de su reposo
            $table->string('file');//imagen del reposo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reposos');
    }
};
