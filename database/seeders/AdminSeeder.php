<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $password = '1234';

        // Agregar el primer administrador
        DB::table('admins')->insert([
            'username' => 'admin1',
            'password' => $password,
            'DNI' => $faker->unique()->randomNumber(8),
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->randomNumber(8),
            'estado' => 'Habilitado',
            'dateOfBirth' => $faker->date,
            'address' => $faker->address,
            'ciudad' => 'BAHIA BLANCA',
            'provincia' => 'Buenos Aires',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Agregar el segundo administrador
        DB::table('admins')->insert([
            'username' => 'admin2',
            'password' => $password,
            'DNI' => $faker->unique()->randomNumber(8),
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->randomNumber(8),
            'estado' => 'Habilitado',
            'dateOfBirth' => $faker->date,
            'address' => $faker->address,
            'ciudad' => 'BAHIA BLANCA',
            'provincia' => 'Buenos Aires',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Agregar el tercer administrador
        DB::table('admins')->insert([
            'username' => 'admin3',
            'password' => $password,
            'DNI' => $faker->unique()->randomNumber(8),
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->randomNumber(8),
            'estado' => 'Habilitado',
            'dateOfBirth' => $faker->date,
            'address' => $faker->address,
            'ciudad' => 'BAHIA BLANCA',
            'provincia' => 'Buenos Aires',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
