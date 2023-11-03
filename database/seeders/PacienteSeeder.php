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
            'DOB' => '1990-01-01',
            'email' => 'paciente@example.com',
            'phone' => 1234567890,
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'address' => 'Direccion 123',
            'ciudad' => 'Ciudad Ejemplo',
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
