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
        Schema::create('horarios_de_atencion_dias_semana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_horario_de_atencion');
            $table->foreign('id_horario_de_atencion')->references('id')->on('horarios_de_atencion');
            $table->unsignedBigInteger('id_dias_semana');
            $table->foreign('id_dias_semana')->references('id')->on('dias_semana');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_de_atencion_dias_semana');
    }
};
