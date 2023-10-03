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
        Schema::create('medicos', function (Blueprint $table) {
            $table->integer("id_medico")->autoIncrement();
            $table->timestamps();
            $table->string("username", 55)->unique();
            $table->unsignedInteger("DNI")->unique();
            $table->string("name", 55);
            $table->string("phone", 55);
            $table->string("state", 55);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
