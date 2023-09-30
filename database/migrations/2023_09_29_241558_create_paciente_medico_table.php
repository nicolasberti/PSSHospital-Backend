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
        Schema::create('paciente_medico', function (Blueprint $table) {
            $table->integer("id_paciente_medico")->autoIncrement();
            $table->date('fecha');
            $table->time("horarioInicio");
            $table->time("horarioFin");
            $table->time("duracion");
            $table->string("state");
            $table->string("diagnostico");
            $table->integer("id_paciente");
            $table->integer("id_medico");
            $table->timestamps();
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes');
            $table->foreign('id_medico')->references('id')->on('medicos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_medico');
    }
    
};
