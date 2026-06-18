<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use App\Http\Requests\StoreOffreEmploiRequest;
use App\Http\Requests\UpdateOffreEmploiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OffreEmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres = OffreEmploi::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('offres.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOffreEmploiRequest $request)
    {
        $data = $request->validated();
        
        // Transform comma-separated skills to array and reset indexes
        $data['competences_requises'] = array_values(array_filter(array_map('trim', explode(',', $data['competences_requises']))));
        
        $data['user_id'] = auth()->id();

        OffreEmploi::create($data);

        return redirect()->route('offres.index')
            ->with('success', 'Offre d\'emploi créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OffreEmploi $offre)
    {
        Gate::authorize('view', $offre);

        return view('offres.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OffreEmploi $offre)
    {
        Gate::authorize('update', $offre);

        return view('offres.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOffreEmploiRequest $request, OffreEmploi $offre)
    {
        Gate::authorize('update', $offre);

        $data = $request->validated();

        // Transform comma-separated skills to array and reset indexes
        $data['competences_requises'] = array_values(array_filter(array_map('trim', explode(',', $data['competences_requises']))));

        $offre->update($data);

        return redirect()->route('offres.index')
            ->with('success', 'Offre d\'emploi mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OffreEmploi $offre)
    {
        Gate::authorize('delete', $offre);

        $offre->delete();

        return redirect()->route('offres.index')
            ->with('success', 'Offre d\'emploi supprimée avec succès.');
    }
}
