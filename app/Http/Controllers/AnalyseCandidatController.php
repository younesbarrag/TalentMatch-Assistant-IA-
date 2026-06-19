<?php

namespace App\Http\Controllers;

use App\Models\AnalyseCandidat;
use Illuminate\View\View;

class AnalyseCandidatController extends Controller
{
    public function show(AnalyseCandidat $analyse): View
    {
        $analyse->load(['candidat', 'offreEmploi']);

        abort_unless(
            $analyse->offreEmploi->user_id === auth()->id(),
            403
        );

        return view('analyses.show', compact('analyse'));
    }
}