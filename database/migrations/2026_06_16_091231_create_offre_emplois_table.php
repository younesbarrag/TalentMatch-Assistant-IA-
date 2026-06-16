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
    Schema::create('offres_emploi', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('titre');
        $table->longText('description');
        $table->json('competences_requises');
        $table->unsignedTinyInteger('niveau_experience_min')->default(0);

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('offres_emploi');
}
};
