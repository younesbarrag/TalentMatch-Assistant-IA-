<?php

namespace App\Models;

use App\Enums\RecommandationAnalyse;
use App\Enums\StatutAnalyse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnalyseCandidat extends Model
{
    protected $table = 'analyses_candidats';

    protected $fillable = [
        'offre_emploi_id',
        'candidat_id',
        'statut',
        'competences_extraites',
        'annees_experience',
        'niveau_etudes',
        'langues',
        'matching_score',
        'points_forts',
        'lacunes',
        'competences_manquantes',
        'recommandation',
        'justification',
        'erreur',
        'analyzed_at',
    ];

    protected $casts = [
        'statut' => StatutAnalyse::class,
        'competences_extraites' => 'array',
        'annees_experience' => 'integer',
        'langues' => 'array',
        'matching_score' => 'integer',
        'points_forts' => 'array',
        'lacunes' => 'array',
        'competences_manquantes' => 'array',
        'recommandation' => RecommandationAnalyse::class,
        'analyzed_at' => 'datetime',
    ];

    public function offreEmploi(): BelongsTo
    {
        return $this->belongsTo(OffreEmploi::class);
    }

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(ConversationAssistant::class);
    }
}