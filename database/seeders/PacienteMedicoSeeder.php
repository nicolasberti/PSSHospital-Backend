<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteMedicoSeeder extends Seeder
{
    public function run()
    {
        $citas = [
            [
                'fecha' => '2023-11-06',
                'horarioInicio' => '08:00:00',
                'horarioFin' => '08:59:00',
                'duracion' => '00:59:00',
                'state' => 'Pendiente',
                'diagnostico' => 'Diagnóstico del paciente 1',
                'paciente_id' => 1, // ID de un paciente existente
                'medico_id' => 1, // ID de un médico existente
            ],
            [
                'fecha' => '2023-11-08',
                'horarioInicio' => '08:00:00',
                'horarioFin' => '08:59:00',
                'duracion' => '00:59:00',
                'state' => 'Pendiente',
                'diagnostico' => 'Diagnóstico del paciente 1',
                'paciente_id' => 1, // ID de un paciente existente
                'medico_id' => 1, // ID de un médico existente
            ],
            [
                'fecha' => '2023-11-05',
                'horarioInicio' => '08:00:00',
                'horarioFin' => '08:59:00',
                'duracion' => '00:59:00',
                'state' => 'Pendiente',
                'diagnostico' => 'Diagnóstico del paciente 1',
                'paciente_id' => 1, // ID de un paciente existente
                'medico_id' => 1, // ID de un médico existente
            ],
            [
                'fecha' => '2023-11-05',
                'horarioInicio' => '08:00:00',
                'horarioFin' => '08:59:00',
                'duracion' => '00:59:00',
                'state' => 'Realizada',
                'diagnostico' => 'Hola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola HolaHola Hola Hola Hola',
                'paciente_id' => 1, // ID de un paciente existente
                'medico_id' => 1, // ID de un médico existente
            ],
            [
                'fecha' => '2023-11-05',
                'horarioInicio' => '08:00:00',
                'horarioFin' => '08:59:00',
                'duracion' => '00:59:00',
                'state' => 'Realizada',
                'diagnostico' => 'Diagnóstico del paciente 1',
                'paciente_id' => 1, // ID de un paciente existente
                'medico_id' => 1, // ID de un médico existente
            ],

        ];

        // Insertar datos en la tabla 'paciente_medico'
        DB::table('paciente_medico')->insert($citas);
    }
}
