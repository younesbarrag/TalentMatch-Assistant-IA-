<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\RoleMessageAssistant;

class MessageAssistant extends Model
{
    protected $fillable = [
        'conversation_assistant_id',
        'role',
        'contenu',
        'tool_name',
        'metadata',
    ];

   protected $casts = [
    'role' => RoleMessageAssistant::class,
    'metadata' => 'array',
];

    public function conversationAssistant(): BelongsTo
    {
        return $this->belongsTo(ConversationAssistant::class);
    }
}