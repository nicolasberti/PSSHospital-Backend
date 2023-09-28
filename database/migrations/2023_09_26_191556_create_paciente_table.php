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
        Schema::create('paciente', function (Blueprint $table) {
            $table->string("id");
            $table->string('DNI')->unique();
            $table->string("username", 55)->unique(); //ver si tiene un usuario o entra con dni
            $table->string("password", 55);
            $table->string("email");
            $table->integer("phone");
            $table->string("name");
            $table->string("lastname");
            $table->date("DOB");
            $table->string("city");
            $table->string("state"); 
            $table->integer("solicitud");
            $table->integer("obra_social");
            $table->timestamps();
            $table->primary('DNI');
            $table->foreign('solicitud')->references('id_solicitud')->on('solicitud_edicion');
            $table->foreign('obra_social')->references('id_obrasocial')->on('obra_social');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
