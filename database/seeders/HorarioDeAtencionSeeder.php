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
                'horario_fin' => '08:59:00',
                'duracion' => '00:59:00', 
                'dias' => 1, // ID de un día existente en 'dias_semana'
            ],
            [
                'horario_inicio' => '09:00:00',
                'horario_fin' => '09:59:00',
                'duracion' => '00:59:00',
                'dias' => 1, // ID de un día existente en 'dias_semana'
            ],
            [
                'horario_inicio' => '09:00:00',
                'horario_fin' => '09:59:00',
                'duracion' => '00:59:00',
                'dias' => 2, // ID de otro día existente en 'dias_semana'
            ],
            // Agrega más registros según sea necesario.
        ];

        // Insertar datos en la tabla 'horarios_de_atencion'
        DB::table('horarios_de_atencion')->insert($horarios);
    }
}
