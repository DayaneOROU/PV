<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nouveau Niveau</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.niveaux.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nom (ex: L1, M2)</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Ordre (ex: 1, 2, 3)</label>
                        <input type="number" name="ordre" value="{{ old('ordre') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                    <a href="{{ route('admin.niveaux.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>