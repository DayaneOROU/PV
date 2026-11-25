<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier la Filière</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.filieres.update', $filiere) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $filiere->nom) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Code</label>
                        <input type="text" name="code" value="{{ old('code', $filiere->code) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Département</label>
                        <select name="departement_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($departements as $dept)
                                <option value="{{ $dept->id }}" @selected(old('departement_id', $filiere->departement_id) == $dept->id)>{{ $dept->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Mettre à jour</button>
                    <a href="{{ route('admin.filieres.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>