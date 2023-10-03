<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pacientes')->insert([
            'DNI' => '123456789',
            'username' => 'paciente1',
            'password' => '1234',
            'email' => 'paciente@example.com',
            'phone' => 1234567890,
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'DOB' => '1990-01-01',
            'city' => 'Ciudad Ejemplo',
            'state' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
