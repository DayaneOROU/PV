<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('semestres')->insert([
            ['numero' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}