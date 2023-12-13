<?php

// La migration de base de données qui créera votre table de base de données.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Utilisation de la syntaxe "return new class" pour créer une classe anonyme étendant Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // La méthode up est exécutée lors de l'application de la migration.
        Schema::create('chirps', function (Blueprint $table) {
            // Création de la table 'chirps'
            $table->id(); // Ajoute une colonne 'id' auto-incrémentée
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Ajoute une colonne 'user_id' comme clé étrangère liée à la table 'users'. La contrainte ON DELETE CASCADE signifie que si l'utilisateur associé est supprimé, le chirp correspondant sera également supprimé.
            $table->string('message'); // Ajoute une colonne 'message' de type chaîne de caractères
            $table->timestamps(); // Ajoute automatiquement les colonnes 'created_at' et 'updated_at' pour gérer les horodatages de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // La méthode down est exécutée lors du rollback de la migration.
        Schema::dropIfExists('chirps'); // Supprime la table 'chirps' si elle existe
    }
};
