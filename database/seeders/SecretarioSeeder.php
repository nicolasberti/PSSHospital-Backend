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
        DB::table('secretarios')->insert([
            'username' => 'secretario1',
            'password' => '1234',
            'DNI' => '12345678',
            'name' => 'Lionel',
            'lastname' => 'Messi',
            'email' => 'secretario1@example.com',
            'phone' => 1234567890,
            'dateOfBirth' => date('1992-06-24'),
            'address' => 'La scaloneta',
            'ciudad' => 'ROSARIO',
            'provincia' => 'Santa Fé',
            'estado' => 'Disponible',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
