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
        Schema::create('diasemanas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('name'); //0 domingo, 1 lunes, 2 martes, 3 miercoles, ...
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diasemana');
    }
};
