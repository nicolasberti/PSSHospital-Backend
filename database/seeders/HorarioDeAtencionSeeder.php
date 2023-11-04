<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioDeAtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Supongamos que ya tienes datos en la tabla 'dias_semana' con IDs existentes.

        // Puedes ajustar los valores de ejemplo según tus necesidades.
        $horarios = [
            [
                'horario_inicio' => '08:00:00',
                'horario_fin' => '16:00:00',
                'duracion' => 30,
            ],
            [
                'horario_inicio' => '09:00:00',
                'horario_fin' => '17:00:00',
                'duracion' => 45,
            ],
            // Agrega más registros según sea necesario.
        ];

        // Insertar datos en la tabla 'horarios_de_atencion'
        DB::table('horarios_de_atencion')->insert($horarios);
    }
}
