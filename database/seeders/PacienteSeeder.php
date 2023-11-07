<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('pacientes')->insert([
                'DNI' => $faker->unique()->numerify('########'),
                'username' => 'paciente' . $i,
                'password' => '1234',
                'DOB' => $faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'name' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'address' => $faker->address(),
                'ciudad' => 'BAHIA BLANCA',
                'provincia' => 'Buenos Aires',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
