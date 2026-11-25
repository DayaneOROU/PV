<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nouvelle Année Académique</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.annees.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Libellé (ex: 2024-2025)</label>
                        <input type="text" name="libelle" value="{{ old('libelle') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                   
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="est_active" value="1" id="est_active" class="mr-2 rounded border-gray-300" {{ old('est_active') ? 'checked' : '' }}>
                        <label for="est_active" class="font-bold">Définir comme année active</label>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                    <a href="{{ route('admin.annees.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>