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
    Schema::create('analyses_candidats', function (Blueprint $table) {
        $table->id();

        $table->foreignId('offre_emploi_id')
            ->constrained('offres_emploi')
            ->cascadeOnDelete();

        $table->foreignId('candidat_id')
            ->constrained('candidats')
            ->cascadeOnDelete();

        $table->string('statut')->default('en_attente');

        $table->json('competences_extraites')->nullable();
        $table->unsignedTinyInteger('annees_experience')->nullable();
        $table->string('niveau_etudes')->nullable();
        $table->json('langues')->nullable();

        $table->unsignedTinyInteger('matching_score')->nullable();
        $table->json('points_forts')->nullable();
        $table->json('lacunes')->nullable();
        $table->json('competences_manquantes')->nullable();

        $table->string('recommandation')->nullable();
        $table->longText('justification')->nullable();

        $table->text('erreur')->nullable();
        $table->timestamp('analyzed_at')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('analyses_candidats');
}
};
