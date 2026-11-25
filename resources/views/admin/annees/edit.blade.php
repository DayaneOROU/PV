<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier l'Année Académique</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.annees.update', $annee) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Libellé</label>
                        <input type="text" name="libelle" value="{{ old('libelle', $annee->libelle) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Mettre à jour</button>
                    <a href="{{ route('admin.annees.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>