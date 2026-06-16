<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OffreEmploi extends Model
{
    protected $table = 'offres_emploi';

    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'competences_requises',
        'niveau_experience_min',
    ];

    protected $casts = [
        'competences_requises' => 'array',
        'niveau_experience_min' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function analyses(): HasMany
    {
        return $this->hasMany(AnalyseCandidat::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(ConversationAssistant::class);
    }
}