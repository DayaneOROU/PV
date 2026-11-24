<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('niveaux')->insert([
            ['code' => 'L1', 'ordre' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L2', 'ordre' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L3', 'ordre' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'M1', 'ordre' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'M2', 'ordre' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}