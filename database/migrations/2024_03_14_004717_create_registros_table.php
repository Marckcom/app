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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('doctipos_id')->references('id')->on('doctipos')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('origens_id')->references('id')->on('origens')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('destinos_id')->references('id')->on('destinos')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('situacions_id')->references('id')->on('situacions')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId(['doctipos_id', 'origens_id','destinos_id','situacions_id']);
            $table->foreignId('doctipos_id')->constrained()->cascadeOnDelete();
            $table->foreignId('origens_id')->constrained()->cascadeOnDelete();
            $table->foreignId('destinos_id')->constrained()->cascadeOnDelete();
            $table->foreignId('situacions_id')->constrained()->cascadeOnDelete();
            $table->string('ndoc')->nullable(); 
            $table->string('objeto')->nullable();
            $table->text('content')->nullable();
            $table->json('tags')->nullable();
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
