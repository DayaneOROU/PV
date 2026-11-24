<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['code' => 'admin', 'nom' => 'Administrateur', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'agent', 'nom' => 'Agent de scolarité', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'chef_D', 'nom' => 'Chef de département', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}