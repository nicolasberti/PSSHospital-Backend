<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HorarioDeAtencionDiaSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('horarios_de_atencion_dias_semana')->insert([
            'id_horario_de_atencion' => 1,
            'id_dias_semana' => 1
        ]);
        DB::table('horarios_de_atencion_dias_semana')->insert([
            'id_horario_de_atencion' => 1,
            'id_dias_semana' => 2
        ]);
        DB::table('horarios_de_atencion_dias_semana')->insert([
            'id_horario_de_atencion' => 1,
            'id_dias_semana' => 3
        ]);
        DB::table('horarios_de_atencion_dias_semana')->insert([
            'id_horario_de_atencion' => 1,
            'id_dias_semana' => 4
        ]);
        DB::table('horarios_de_atencion_dias_semana')->insert([
            'id_horario_de_atencion' => 1,
            'id_dias_semana' => 5
        ]);
    }
}
