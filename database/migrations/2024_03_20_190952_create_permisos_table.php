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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personals_id')->references('id')->on('personals')->constrained()->cascadeOnDelete();
            $table->string('motivo');
            $table->string('service');//afecta la service
            $table->date('date'); //desde
            $table->date('fecha');//hasta
            $table->string('total');//total de horas
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
