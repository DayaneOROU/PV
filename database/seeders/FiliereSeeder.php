<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère les IDs des départements (les codes correspondent exactement au DepartementSeeder)
        $depStat = DB::table('departements')->where('code', 'STAT')->value('id');
        $depInfo = DB::table('departements')->where('code', 'IG')->value('id');
        $depPlan = DB::table('departements')->where('code', 'PLAN')->value('id');
        $depManag = DB::table('departements')->where('code', 'MANAGEMENT')->value('id');
        $depExpert = DB::table('departements')->where('code', 'EXPERTISE')->value('id');

        DB::table('filieres')->insert([
            // --- DÉPARTEMENT STATISTIQUE ---
            ['departement_id' => $depStat, 'code' => 'STAT', 'nom' => 'Statistique', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depStat, 'code' => 'ISE', 'nom' => 'Ingénieur Statisticien et Économiste', 'created_at' => now(), 'updated_at' => now()],

            // --- DÉPARTEMENT INFORMATIQUE ---
            ['departement_id' => $depInfo, 'code' => 'IG', 'nom' => 'Informatique de Gestion', 'created_at' => now(), 'updated_at' => now()],
            // J'ajoute AIP et ARI si tu veux les gérer comme des filières (option 2)
            ['departement_id' => $depInfo, 'code' => 'AIP', 'nom' => 'Analyse Informatique et Programmation', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depInfo, 'code' => 'ARI', 'nom' => 'Administration des Réseaux Informatiques', 'created_at' => now(), 'updated_at' => now()],

            // --- DÉPARTEMENT PLANIFICATION ---
            ['departement_id' => $depPlan, 'code' => 'PLAN', 'nom' => 'Planification', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depPlan, 'code' => 'PGP', 'nom' => 'Planification et Gestion des Projets', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depPlan, 'code' => 'DLR', 'nom' => 'Développement Local et Régional', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depPlan, 'code' => 'EGE', 'nom' => 'Économie et Gestion de l’Environnement', 'created_at' => now(), 'updated_at' => now()],

            // --- DÉPARTEMENT MANAGEMENT ---
            ['departement_id' => $depManag, 'code' => 'GCO', 'nom' => 'Gestion Commerciale', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depManag, 'code' => 'GRH', 'nom' => 'Gestion des Ressources Humaines', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depManag, 'code' => 'GTL', 'nom' => 'Gestion des Transports et Logistiques', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depManag, 'code' => 'GBA', 'nom' => 'Gestion des Banques et Assurances', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depManag, 'code' => 'GFC', 'nom' => 'Gestion Financière et Comptable', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depManag, 'code' => 'BFM', 'nom' => 'Banque et Finance de Marché', 'created_at' => now(), 'updated_at' => now()],

            // --- DÉPARTEMENT EXPERTISE COMPTABLE ---
            ['departement_id' => $depExpert, 'code' => 'DECOGEF', 'nom' => 'Diplôme d’Études de Comptabilité et de Gestion Financière', 'created_at' => now(), 'updated_at' => now()],
            ['departement_id' => $depExpert, 'code' => 'DESCOGEF', 'nom' => 'Diplôme d’Études Supérieures de Comptabilité et de Gestion Financière', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}