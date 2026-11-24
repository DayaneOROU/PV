<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère l'ID du rôle admin
        $roleAdmin = DB::table('roles')->where('code', 'admin')->first();

        DB::table('users')->insert([
            'name' => 'Administrateur ENEAM',
            'email' => 'admin@eneam.bj',
            'password' => Hash::make('password123'), // Mot de passe sécurisé
            'role_id' => $roleAdmin->id,
            'actif' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}