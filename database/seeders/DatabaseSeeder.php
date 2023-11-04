<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProvinciasTableSeeder::class,
            DiaSemanaSeeder::class,
            HorarioDeAtencionSeeder::class,
            AdminSeeder::class,
            MedicoSeeder::class,
            SecretarioSeeder::class,
            PacienteSeeder::class,
            PacienteMedicoSeeder::class,
        ]);
    }
}
