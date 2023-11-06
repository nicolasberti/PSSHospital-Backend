<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecretarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('secretarios')->insert([
                'username' => 'secretario' . $i,
                'password' => '1234',
                'DNI' => $this->generateRandomDNI(),
                'name' => 'Nombre' . $i,
                'lastname' => 'Apellido' . $i,
                'email' => 'secretario' . $i . '@example.com',
                'phone' => $this->generateRandomPhoneNumber(),
                'dateOfBirth' => $this->generateRandomDate(),
                'address' => 'Dirección' . $i,
                'ciudad' => 'Ciudad' . $i,
                'provincia' => 'Provincia' . $i,
                'estado' => 'Disponible',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateRandomDNI() {
        $dni = '';
        for ($i = 0; $i < 8; $i++) {
            $dni .= mt_rand(0, 9);
        }
        return $dni;
    }

    private function generateRandomPhoneNumber() {
        $phoneNumber = '';
        for ($i = 0; $i < 10; $i++) {
            $phoneNumber .= mt_rand(0, 9);
        }
        return $phoneNumber;
    }

    private function generateRandomDate() {
        $year = mt_rand(1990, 2000);
        $month = mt_rand(1, 12);
        $day = mt_rand(1, 28);
        return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    }
}
