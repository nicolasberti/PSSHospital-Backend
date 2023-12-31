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
            $table->id();
            $table->string("username", 55)->unique();
            $table->string("password", 55);
            $table->unsignedInteger("DNI")->unique();
            $table->string("name", 55);
            $table->string("lastName", 55);
            $table->string("email", 55);
            $table->unsignedInteger("phone");
            $table->string("state", 55);
            $table->string("especialidad", 55);
            $table->timestamps();
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
