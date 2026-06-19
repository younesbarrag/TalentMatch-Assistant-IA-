<?php

namespace App\Jobs;

use App\Enums\RecommandationAnalyse;
use App\Enums\StatutAnalyse;
use App\Models\AnalyseCandidat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AnalyserCandidatJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int $analyseCandidatId
    ) {
        //
    }

    public function handle(): void
    {
        $analyse = AnalyseCandidat::with(['candidat', 'offreEmploi'])
            ->findOrFail($this->analyseCandidatId);

        $analyse->update([
            'statut' => StatutAnalyse::EnCours,
        ]);

        /*
         * Résultat temporaire فقط باش نجربو queue.
         * من بعد غادي نعوضو هاد fake result بالـ IA structured output.
         */
        $analyse->update([
            'statut' => StatutAnalyse::Terminee,
            'competences_extraites' => [
                'Laravel',
                'PHP',
                'MySQL',
                'Git',
                'API REST',
            ],
            'annees_experience' => 1,
            'niveau_etudes' => 'Développement web',
            'langues' => [
                'Arabe',
                'Français',
                'Anglais',
            ],
            'matching_score' => 78,
            'points_forts' => [
                'Bonne base en Laravel',
                'Connaissance des CRUD et de MySQL',
                'Profil motivé pour évoluer en backend',
            ],
            'lacunes' => [
                'Expérience encore limitée',
                'Pas assez de détails sur les tests automatisés',
            ],
            'competences_manquantes' => [
                'Docker',
                'Tests automatisés',
            ],
            'recommandation' => RecommandationAnalyse::Convoquer,
            'justification' => 'Le candidat correspond globalement à l’offre Laravel junior. Il possède les bases nécessaires en Laravel, PHP et MySQL, mais doit encore progresser sur les tests et les outils DevOps.',
            'analyzed_at' => now(),
        ]);
    }
}