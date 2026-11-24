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
    Schema::create('pv_ocr_matricules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pv_ocr_id')->constrained('pv_ocr')->onDelete('cascade');
        $table->string('matricule');
        $table->integer('page')->nullable();
        $table->float('confiance')->nullable();
        $table->boolean('valide')->default(false);
        $table->timestamps();
        
        // Index pour accélérer la recherche
        $table->index('matricule');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pv_ocr_matricules');
    }
};
