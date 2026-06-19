<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $offre->titre }}
            </h2>

            <div class="flex space-x-2">
                <a href="{{ route('offres.edit', $offre) }}"
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                    {{ __('Modifier') }}
                </a>

                <a href="{{ route('offres.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    {{ __('Retour à la liste') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Détail de l'offre --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">
                            {{ __('Description') }}
                        </h3>

                        <div class="prose max-w-none text-gray-700 whitespace-pre-line">
                            {{ $offre->description }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-100">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-widest mb-2">
                                {{ __('Compétences requises') }}
                            </h3>

                            <div class="flex flex-wrap gap-2">
                                @if (is_array($offre->competences_requises))
                                    @foreach ($offre->competences_requises as $competence)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $competence }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-widest mb-2">
                                {{ __('Expérience minimum') }}
                            </h3>

                            <p class="text-gray-900 font-medium">
                                {{ $offre->niveau_experience_min }} {{ __('ans') }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-500">
                            {{ __('Créée le') }} {{ $offre->created_at->format('d/m/Y à H:i') }}

                            @if ($offre->updated_at != $offre->created_at)
                                | {{ __('Mise à jour le') }} {{ $offre->updated_at->format('d/m/Y à H:i') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Formulaire candidat --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        {{ __('Soumettre un candidat') }}
                    </h3>

                    <form method="POST" action="{{ route('offres.candidats.store', $offre) }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700">
                                {{ __('Nom du candidat') }}
                            </label>

                            <input
                                id="nom"
                                type="text"
                                name="nom"
                                value="{{ old('nom') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >

                            @error('nom')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Email') }}
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700">
                                {{ __('Téléphone') }}
                            </label>

                            <input
                                id="telephone"
                                type="text"
                                name="telephone"
                                value="{{ old('telephone') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('telephone')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="cv_texte" class="block text-sm font-medium text-gray-700">
                                {{ __('Texte du CV') }}
                            </label>

                            <textarea
                                id="cv_texte"
                                name="cv_texte"
                                rows="8"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >{{ old('cv_texte') }}</textarea>

                            @error('cv_texte')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            {{ __('Soumettre le CV') }}
                        </button>
                    </form>
                </div>
            </div>

            {{-- Candidats soumis --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        {{ __('Candidats soumis') }}
                    </h3>

                    @if ($offre->analyses->isEmpty())
                        <p class="text-gray-600">
                            {{ __('Aucun candidat soumis pour cette offre.') }}
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Candidat
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Statut
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Score
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Recommandation
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($offre->analyses as $analyse)
                                        <tr>
                                            <td class="px-4 py-2">
                                                {{ $analyse->candidat->nom }}
                                            </td>

                                            <td class="px-4 py-2">
                                                {{ is_object($analyse->statut) ? $analyse->statut->label() : $analyse->statut }}
                                            </td>

                                            <td class="px-4 py-2">
                                                {{ $analyse->matching_score !== null ? $analyse->matching_score . '/100' : '-' }}
                                            </td>

                                            <td class="px-4 py-2">
                                                @if ($analyse->recommandation)
                                                    {{ is_object($analyse->recommandation) ? $analyse->recommandation->label() : $analyse->recommandation }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td class="px-4 py-2">
                                                <a href="{{ route('analyses.show', $analyse) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    {{ __('Voir analyse') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>