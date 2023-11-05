<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dias_semana')->insert(['dia' => 'Lunes']);
        DB::table('dias_semana')->insert(['dia' => 'Martes']);
        DB::table('dias_semana')->insert(['dia' => 'Miercoles']);
        DB::table('dias_semana')->insert(['dia' => 'Jueves']);
        DB::table('dias_semana')->insert(['dia' => 'Viernes']);
        DB::table('dias_semana')->insert(['dia' => 'Sabado']);
        DB::table('dias_semana')->insert(['dia' => 'Domingo']);
    }
}
