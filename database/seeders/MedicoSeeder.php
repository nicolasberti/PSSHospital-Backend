<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('medicos')->insert([
            'username' => 'medico1',
            'password' => '1234',
            'DNI' => $faker->unique()->randomNumber(8),
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->randomNumber(8),
            'estado' => 'Activo',
            'ciudad' => 'BAHIA BLANCA',
            'provincia' => 'Buenos Aires',
            'especialidad' => "Pediatra",
            'horarios_atencion' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

