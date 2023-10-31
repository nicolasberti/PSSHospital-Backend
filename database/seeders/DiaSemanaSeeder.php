<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diasemanas')->insert([
            'name' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('diasemanas')->insert([
            'name' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);DB::table('diasemanas')->insert([
            'name' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}