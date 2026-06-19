<?php

namespace App\Http\Controllers;

use App\Enums\StatutAnalyse;
use App\Http\Requests\StoreCandidatRequest;
use App\Jobs\AnalyserCandidatJob;
use App\Models\AnalyseCandidat;
use App\Models\Candidat;
use App\Models\OffreEmploi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    public function store(StoreCandidatRequest $request, OffreEmploi $offre): RedirectResponse
    {
        $validated = $request->validated();

        $analyse = DB::transaction(function () use ($validated, $offre) {
            $candidat = Candidat::create([
                'user_id' => auth()->id(),
                'nom' => $validated['nom'],
                'email' => $validated['email'] ?? null,
                'telephone' => $validated['telephone'] ?? null,
                'cv_texte' => $validated['cv_texte'],
            ]);

            return AnalyseCandidat::create([
                'offre_emploi_id' => $offre->id,
                'candidat_id' => $candidat->id,
                'statut' => StatutAnalyse::EnAttente,
            ]);
        });

        AnalyserCandidatJob::dispatch($analyse->id);

        return redirect()
            ->route('offres.show', $offre)
            ->with('success', 'Candidat soumis avec succès. Analyse lancée en arrière-plan.');
    }
}