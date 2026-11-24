<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            NiveauSeeder::class,
            SemestreSeeder::class,
            AnneeAcademiqueSeeder::class,
            AdminSeeder::class,
            DepartementSeeder::class,
            FiliereSeeder::class,
        ]);
    }
}