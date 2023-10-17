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
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 6; $i++) {
            //$secretarios = Secretario::inRandomOrder()->first(); // Obtén un secretario existente de forma aleatoria
            //$pacientes = Paciente::inRandomOrder()->first(); // Obtén un paciente existente de forma aleatoria

            DB::table('secretario_paciente')->insert([
                'secretario_id' => '1',//$secretarios->id,
                'paciente_id' => '1',// $pacientes->id,
                'descripcion' => $faker->sentence,
                'estado' => $faker->randomElement(['pendiente', 'realizada', 'rechazada']),
        ]);
    }
    }
}
