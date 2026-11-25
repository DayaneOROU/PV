<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nouvelle Filière</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.filieres.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Code</label>
                        <input type="text" name="code" value="{{ old('code') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Département</label>
                        <select name="departement_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Choisir --</option>
                            @foreach($departements as $dept)
                                <option value="{{ $dept->id }}" @selected(old('departement_id') == $dept->id)>{{ $dept->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                    <a href="{{ route('admin.filieres.index') }}" class="ml-2 text-gray-600">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>