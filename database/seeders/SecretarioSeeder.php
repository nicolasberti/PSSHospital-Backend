<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SecretarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('secretarios')->insert([
                'username' => 'secretario' . $i,
                'password' => '1234',
                'DNI' => $faker->unique()->randomNumber(8),
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->randomNumber(8),
                'dateOfBirth' => $faker->date,
                'address' => $faker->address,
                'ciudad' => 'BAHIA BLANCA',
                'provincia' => 'Buenos Aires',
                'estado' => 'Disponible',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateRandomDate() {
        $year = mt_rand(1990, 2000);
        $month = mt_rand(1, 12);
        $day = mt_rand(1, 28);
        return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    }
}
