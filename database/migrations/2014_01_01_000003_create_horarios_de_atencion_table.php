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
        Schema::create('horarios_de_atencion', function (Blueprint $table) {
            $table->id();
            $table->time('horario_inicio');
            $table->time('horario_fin');
            $table->integer('duracion');
            $table->timestamps();
            $table->bigInteger('dias')->unsigned();
            $table->foreign('dias')->references('id')->on('dias_semana');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_de_atencion');
    }
};
