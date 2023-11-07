<?php

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
    }
}
