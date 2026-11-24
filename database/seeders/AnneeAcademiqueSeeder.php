<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeAcademiqueSeeder extends Seeder
{
    public function run(): void
    {
        $annees = [];
        
        // On boucle de 2012 à 2025
        for ($annee = 2012; $annee <= 2027; $annee++) {
            $anneeSuivante = $annee + 1;
            $annees[] = [
                'libelle' => $annee . '-' . $anneeSuivante,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // On insère toutes les années d'un coup dans la base
        DB::table('annees_academiques')->insert($annees);
    }
}