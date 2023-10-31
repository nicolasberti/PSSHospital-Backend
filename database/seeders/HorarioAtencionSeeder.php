<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioAtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('horario_atencion')->insert([
            'horarioInicio' => '08:00:00',
            'horarioFin' => '12:00:00',
            'duracion' => 60,
            'medico_id' => 1,
            'diasemana_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('horario_atencion')->insert([
            'horarioInicio' => '08:00:00',
            'horarioFin' => '12:00:00',
            'duracion' => 60,
            'medico_id' => 1,
            'diasemana_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('horario_atencion')->insert([
            'horarioInicio' => '08:00:00',
            'horarioFin' => '12:00:00',
            'duracion' => 60,
            'medico_id' => 1,
            'diasemana_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('horario_atencion')->insert([
            'horarioInicio' => '08:00:00',
            'horarioFin' => '12:00:00',
            'duracion' => 60,
            'medico_id' => 1,
            'diasemana_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('horario_atencion')->insert([
            'horarioInicio' => '08:00:00',
            'horarioFin' => '12:00:00',
            'duracion' => 60,
            'medico_id' => 1,
            'diasemana_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}