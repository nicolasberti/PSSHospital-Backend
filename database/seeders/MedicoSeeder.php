<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicos')->insert([
            'username' => 'medico1',
            'DNI' => 123456789,
            'name' => 'Dr. Juan Perez',
            'phone' => '1234567890',
            'state' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
