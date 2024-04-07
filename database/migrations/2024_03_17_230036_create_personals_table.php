<?php

use App\Models\Infopersonal;
use App\Models\Oficial;
use App\Models\Suboficial;
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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            
        //ESTAS SON LAS RELACIONES CON LAS TABLAS
        $table->foreignId('grados_id')->references('id')->on('grados')->constrained()->cascadeOnDelete();
        $table->foreignId('categorias_id')->references('id')->on('categorias')->constrained()->cascadeOnDelete(); 
        $table->foreignId('cuadros_id')->references('id')->on('cuadros')->constrained()->cascadeOnDelete(); 
        $table->foreignId('fuerzas_id')->references('id')->on('fuerzas')->constrained()->cascadeOnDelete(); 
        $table->foreignId('armas_id')->references('id')->on('armas')->constrained()->cascadeOnDelete(); 
        $table->foreignId('estados_id')->references('id')->on('estados')->constrained()->cascadeOnDelete(); 
        // $table->foreignId('familias_id')->references('id')->on('familias')->constrained()->cascadeOnDelete(); 
       // $table->foreignId('cursos_id')->references('id')->on('cursos')->constrained()->cascadeOnDelete(); 
        //$table->foreignId('permisos_id')->references('id')->on('permisos')->constrained()->cascadeOnDelete(); 
        //$table->foreignId('reposos_id')->references('id')->on('reposos')->constrained()->cascadeOnDelete(); 
       // $table->foreignId('cargos_id')->references('id')->on('cargos')->constrained()->cascadeOnDelete(); 
        //$table->foreignId('viajes_id')->references('id')->on('viajes')->constrained()->cascadeOnDelete(); 
        //$table->foreignId('arrestos_id')->references('id')->on('arrestos')->constrained()->cascadeOnDelete(); 
        //$table->foreignId('infopersonals_id')->references('id')->on('infopersonals')->constrained()->cascadeOnDelete();

        //ESTOS SON LOS DATOS PERSONALES UNICOS 
            $table->string('image');
            $table->string('names');
            $table->string('lastnames');
            $table->date('birthday')->nullable();
            $table->string('gender');
            $table->string('estado');
            $table->string('cedula');
            $table->string('cifile');
            $table->string('cifile_dos');
            $table->string('cimilitar');
            $table->string('cifilemilitar');
            $table->string('cifilemilitar_dos');
            $table->string('lnacimiento');
            $table->string('phone');
            $table->string('celular');//segundo
            $table->string('email')->unique();
            $table->string('fegreso');
            $table->string('decreto');//nombre
            $table->string('decretofile');//pdf    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
