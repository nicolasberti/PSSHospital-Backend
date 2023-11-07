<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Secretario;
use App\Models\Paciente;

class SecretarioPacienteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            DB::table('secretario_paciente')->insert([
                'secretario_id' => $faker->numberBetween(1, 10), // Reemplaza el rango con el rango apropiado de tus secretarios
                'paciente_id' => $faker->numberBetween(1, 20), // Reemplaza el rango con el rango apropiado de tus pacientes
                'descripcion' => $faker->sentence,
                'estado' => $faker->randomElement(['pendiente', 'realizada', 'rechazada']),
            ]);
        }
    }
}
