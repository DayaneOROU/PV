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
    Schema::create('pv_ocr', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pv_id')->constrained('pvs')->onDelete('cascade');
        $table->enum('statut', ['en_attente', 'en_cours', 'termine', 'echoue'])->default('en_attente');
        $table->text('texte_brut')->nullable();
        $table->datetime('traite_le')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pv_ocr');
    }
};
