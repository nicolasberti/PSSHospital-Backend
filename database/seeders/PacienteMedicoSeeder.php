<?php

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PacienteMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacientes = DB::table('pacientes')->pluck('id')->toArray();
        $medicos = DB::table('medicos')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $pacienteId = $pacientes[rand(0, count($pacientes) - 1)];
            $medicoId = $medicos[rand(0, count($medicos) - 1)];

            $fecha = date('Y-m-d', strtotime('+' . rand(1, 30) . ' days')); // Genera una fecha entre 1 y 30 días en el futuro

            DB::table('paciente_medico')->insert([
                'fecha' => $fecha,
                'horarioInicio' => date('H:i:s'),
                'horarioFin' => date('H:i:s'),
                'duracion' => '00:30:00',
                'state' => 'pendiente',
                'diagnostico' => 'diagnostico ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
                'id_paciente' => $pacienteId,
                'id_medico' => $medicoId,
            ]);
        }
=======
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
>>>>>>> Sprint-3-paciente
    }
}
