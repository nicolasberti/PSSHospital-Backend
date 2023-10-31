<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diasemanas')->insert([
            'name' => 'Lunes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 'Martes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 'Miercoles',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 'Jueves',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 'Viernes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 'Sabado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);DB::table('diasemanas')->insert([
            'name' => 'Domingo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}