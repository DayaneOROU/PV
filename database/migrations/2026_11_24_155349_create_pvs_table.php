<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('pvs', function (Blueprint $table) {
        $table->id();
        $table->string('reference')->unique();
        $table->foreignId('filiere_id')->constrained('filieres');
        $table->foreignId('niveau_id')->constrained('niveaux');
        $table->foreignId('semestre_id')->nullable()->constrained('semestres');
        $table->foreignId('annee_academique_id')->constrained('annees_academiques');
        $table->foreignId('uploaded_by')->constrained('users');
        
        // Enums
        $table->enum('type_pv', ['semestriel', 'annuel', 'rattrapage']);
        $table->enum('session', ['normale', 'rattrapage']);
        $table->enum('statut', ['brouillon', 'valide', 'archive'])->default('brouillon');
        
        $table->date('date_deliberation')->nullable();
        $table->string('groupe')->nullable(); // ex: "IG1-C"
        $table->string('fichier_path'); // Chemin vers le PDF
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pvs');
    }
};
