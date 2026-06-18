<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $offre->titre }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('offres.edit', $offre) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Modifier') }}
                </a>
                <a href="{{ route('offres.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Retour à la liste') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('Description') }}</h3>
                        <div class="prose max-w-none text-gray-700 whitespace-pre-line">
                            {{ $offre->description }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-100">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-widest mb-2">{{ __('Compétences requises') }}</h3>
                            <div class="flex flex-wrap gap-2">
                                @if(is_array($offre->competences_requises))
                                    @foreach($offre->competences_requises as $competence)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $competence }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-widest mb-2">{{ __('Expérience minimum') }}</h3>
                            <p class="text-gray-900 font-medium">
                                {{ $offre->niveau_experience_min }} {{ __('ans') }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-500">
                            {{ __('Créée le') }} {{ $offre->created_at->format('d/m/Y à H:i') }}
                            @if($offre->updated_at != $offre->created_at)
                                | {{ __('Mise à jour le') }} {{ $offre->updated_at->format('d/m/Y à H:i') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
