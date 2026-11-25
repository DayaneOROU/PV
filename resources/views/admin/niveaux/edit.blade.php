<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier le Niveau</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.niveaux.update', $niveau) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $niveau->nom) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Ordre</label>
                        <input type="number" name="ordre" value="{{ old('ordre', $niveau->ordre) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Mettre à jour</button>
                    <a href="{{ route('admin.niveaux.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>