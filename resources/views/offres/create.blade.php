<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une offre d\'emploi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('offres.store') }}" class="space-y-6">
                        @csrf

                        <!-- Titre -->
                        <div>
                            <x-input-label for="titre" :value="__('Titre de l\'offre')" />
                            <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" required>{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Compétences Requises -->
                        <div>
                            <x-input-label for="competences_requises" :value="__('Compétences (séparées par des virgules)')" />
                            <x-text-input id="competences_requises" name="competences_requises" type="text" class="mt-1 block w-full" :value="old('competences_requises')" required placeholder="Laravel, Vue.js, PHP, SQL" />
                            <p class="text-sm text-gray-500 mt-1">{{ __('Exemple: PHP, Laravel, Tailwind CSS, JavaScript') }}</p>
                            <x-input-error class="mt-2" :messages="$errors->get('competences_requises')" />
                        </div>

                        <!-- Niveau Expérience Min -->
                        <div>
                            <x-input-label for="niveau_experience_min" :value="__('Expérience minimum (en années)')" />
                            <x-text-input id="niveau_experience_min" name="niveau_experience_min" type="number" class="mt-1 block w-full" :value="old('niveau_experience_min', 0)" required min="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('niveau_experience_min')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                            <a href="{{ route('offres.index') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
