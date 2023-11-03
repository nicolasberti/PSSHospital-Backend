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
        Schema::create('secretarios', function (Blueprint $table) {
            $table->id();
            $table->string('DNI')->unique();
            $table->string("username")->unique();
            $table->string("password");
            $table->string("name");
            $table->string("lastname");
            $table->string("email")->unique();
            $table->string("phone");
            $table->date('dateOfBirth');
            $table->string('address');
            $table->string("ciudad");
            $table->string("provincia");
            $table->string("estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretarios');
    }
};
