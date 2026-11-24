<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // On ajoute deleted_at à la table users
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        // On ajoute deleted_at à la table pvs
        Schema::table('pvs', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pvs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};