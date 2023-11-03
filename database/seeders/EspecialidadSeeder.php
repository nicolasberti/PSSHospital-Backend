<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especialidades')->insert(['nombre'=>'Pediatría']);
        DB::table('especialidades')->insert(['nombre'=>'Oftalmología']);
        DB::table('especialidades')->insert(['nombre'=>'Médico clínico']);
    }
}
