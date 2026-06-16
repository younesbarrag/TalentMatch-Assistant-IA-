<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConversationAssistant extends Model
{
    protected $fillable = [
        'user_id',
        'offre_emploi_id',
        'analyse_candidat_id',
        'titre',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function offreEmploi(): BelongsTo
    {
        return $this->belongsTo(OffreEmploi::class);
    }

    public function analyseCandidat(): BelongsTo
    {
        return $this->belongsTo(AnalyseCandidat::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(MessageAssistant::class);
    }
}