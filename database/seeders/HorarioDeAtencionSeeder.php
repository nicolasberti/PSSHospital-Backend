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
        $horarios = [];

        for ($i = 8; $i <= 17; $i++) {
            $horarios[] = [
                'horario_inicio' => sprintf('%02d:00:00', $i),
                'horario_fin' => sprintf('%02d:00:00', $i + 1),
                'duracion' => '01:00:00',
            ];
        }

        // Insertar datos en la tabla 'horarios_de_atencion'
        DB::table('horarios_de_atencion')->insert($horarios);
    }
}
