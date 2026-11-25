<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Filières</h2>
            <a href="{{ route('admin.filieres.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Nouvelle</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">{{ session('success') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-2">Nom</th>
                            <th class="py-3 px-2">Code</th>
                            <th class="py-3 px-2">Département</th>
                            <th class="py-3 px-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($filieres as $filiere)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-2">{{ $filiere->nom }}</td>
                            <td class="py-3 px-2">{{ $filiere->code }}</td>
                            <td class="py-3 px-2">{{ $filiere->departement->nom ?? 'N/A' }}</td>
                            <td class="py-3 px-2 flex gap-3">
                                <a href="{{ route('admin.filieres.edit', $filiere) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('admin.filieres.destroy', $filiere) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="py-4 text-center">Aucune filière.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>