<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Analyse du candidat
            </h2>

            <a href="{{ route('offres.show', $analyse->offreEmploi) }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Retour à l'offre
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Informations du candidat
                    </h3>

                    <p><strong>Nom :</strong> {{ $analyse->candidat->nom }}</p>
                    <p><strong>Email :</strong> {{ $analyse->candidat->email ?? '-' }}</p>
                    <p><strong>Téléphone :</strong> {{ $analyse->candidat->telephone ?? '-' }}</p>
                    <p><strong>Offre :</strong> {{ $analyse->offreEmploi->titre }}</p>
                    <p>
                        <strong>Statut :</strong>
                        {{ is_object($analyse->statut) ? $analyse->statut->label() : $analyse->statut }}
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Résultat de l'analyse IA
                    </h3>

                    <p>
                        <strong>Score :</strong>
                        {{ $analyse->matching_score !== null ? $analyse->matching_score . '/100' : 'En attente' }}
                    </p>

                    <p>
                        <strong>Recommandation :</strong>
                        @if ($analyse->recommandation)
                            {{ is_object($analyse->recommandation) ? $analyse->recommandation->label() : $analyse->recommandation }}
                        @else
                            En attente
                        @endif
                    </p>

                    <div class="mt-4">
                        <strong>Compétences extraites :</strong>

                        @if (!empty($analyse->competences_extraites))
                            <ul class="list-disc ml-6 mt-2">
                                @foreach ($analyse->competences_extraites as $competence)
                                    <li>{{ $competence }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 mt-2">En attente de l'analyse IA.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <strong>Points forts :</strong>

                        @if (!empty($analyse->points_forts))
                            <ul class="list-disc ml-6 mt-2">
                                @foreach ($analyse->points_forts as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 mt-2">En attente.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <strong>Lacunes :</strong>

                        @if (!empty($analyse->lacunes))
                            <ul class="list-disc ml-6 mt-2">
                                @foreach ($analyse->lacunes as $lacune)
                                    <li>{{ $lacune }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 mt-2">En attente.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <strong>Compétences manquantes :</strong>

                        @if (!empty($analyse->competences_manquantes))
                            <ul class="list-disc ml-6 mt-2">
                                @foreach ($analyse->competences_manquantes as $competence)
                                    <li>{{ $competence }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 mt-2">En attente.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <strong>Justification :</strong>
                        <p class="text-gray-700 mt-2">
                            {{ $analyse->justification ?? 'En attente de l’analyse IA.' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>