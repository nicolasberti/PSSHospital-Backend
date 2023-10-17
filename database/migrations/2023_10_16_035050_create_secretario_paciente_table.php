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
        Schema::create('secretario_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secretario_id');
            $table->unsignedBigInteger('paciente_id');
            $table->string('descripcion');
            $table->enum('estado', ['pendiente', 'realizada', 'rechazada']);
            $table->timestamps();

            $table->foreign('secretario_id')->references('id')->on('secretarios');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretario_paciente');
    }
};
