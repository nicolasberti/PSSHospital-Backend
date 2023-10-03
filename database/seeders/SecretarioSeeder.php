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
            'Name' => 'Nombre del Secretario',
            'Email' => 'secretario1@example.com',
            'Phone' => 1234567890,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
