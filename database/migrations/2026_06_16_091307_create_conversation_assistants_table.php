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
    Schema::create('conversations_assistants', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('offre_emploi_id')
            ->nullable()
            ->constrained('offres_emploi')
            ->nullOnDelete();

        $table->foreignId('analyse_candidat_id')
            ->nullable()
            ->constrained('analyses_candidats')
            ->nullOnDelete();

        $table->string('titre')->nullable();
        $table->json('metadata')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('conversations_assistants');
}
};
