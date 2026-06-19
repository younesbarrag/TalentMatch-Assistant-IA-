<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OffreEmploiController;
use App\Http\Controllers\AnalyseCandidatController;
use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('offres', OffreEmploiController::class);

    Route::post('/offres/{offre}/candidats', [CandidatController::class, 'store'])
        ->name('offres.candidats.store');

    Route::get('/analyses/{analyse}', [AnalyseCandidatController::class, 'show'])
        ->name('analyses.show');
});

require __DIR__.'/auth.php';