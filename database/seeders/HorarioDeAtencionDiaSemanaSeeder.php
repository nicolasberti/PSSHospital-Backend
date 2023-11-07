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
        // Asociación los primeros 5 HorarioDeAtencion con los id_dias_semana 1, 3 y 5
        for ($i = 1; $i <= 5; $i++) {
            DB::table('horarios_de_atencion_dias_semana')->insert([
                'id_horario_de_atencion' => $i,
                'id_dias_semana' => 1
            ]);
            DB::table('horarios_de_atencion_dias_semana')->insert([
                'id_horario_de_atencion' => $i,
                'id_dias_semana' => 3
            ]);
            DB::table('horarios_de_atencion_dias_semana')->insert([
                'id_horario_de_atencion' => $i,
                'id_dias_semana' => 5
            ]);
        }

        // Asocia los otros 5 HorarioDeAtencion con los id_dias_semana 2 y 4
        for ($i = 6; $i <= 10; $i++) {
            DB::table('horarios_de_atencion_dias_semana')->insert([
                'id_horario_de_atencion' => $i,
                'id_dias_semana' => 2
            ]);
            DB::table('horarios_de_atencion_dias_semana')->insert([
                'id_horario_de_atencion' => $i,
                'id_dias_semana' => 4
            ]);
        }
    }
}
