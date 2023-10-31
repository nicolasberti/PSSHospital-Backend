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
        Schema::create('horario_atencion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('horarioInicio');
            $table->time('horarioFin');
            $table->unsignedInteger('duracion');

            $table->foreignId('medico_id')->constrained();
            $table->foreignId('diasemana_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_atencion');
    }
};
