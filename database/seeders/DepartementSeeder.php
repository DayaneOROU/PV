<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departements')->insert([
            ['code' => 'STAT', 'nom' => 'Département de la Statistique', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'IG', 'nom' => 'Département Informatique', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'PLAN', 'nom' => 'Planification du Développement', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'MANAGEMENT', 'nom' => 'Management des Organisations', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'EXPERTISE', 'nom' => 'Expertise Comptable', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}