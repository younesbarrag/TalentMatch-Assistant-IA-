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
    Schema::create('messages_assistants', function (Blueprint $table) {
        $table->id();

        $table->foreignId('conversation_assistant_id')
            ->constrained('conversations_assistants')
            ->cascadeOnDelete();

        $table->string('role');
        $table->longText('contenu');

        $table->string('tool_name')->nullable();
        $table->json('metadata')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('messages_assistants');
}
};
