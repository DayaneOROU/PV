<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Utilisateurs
            </h2>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nouvel Utilisateur
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">{{ session('error') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-2">Nom</th>
                            <th class="py-3 px-2">Email</th>
                            <th class="py-3 px-2">Rôle</th>
                            <th class="py-3 px-2">Date d'inscription</th>
                            <th class="py-3 px-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-2 font-medium">{{ $user->name }}</td>
                            <td class="py-3 px-2">{{ $user->email }}</td>
                            <td class="py-3 px-2">
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                    {{ $user->role->nom ?? 'Aucun' }}
                                </span>
                            </td>
                            <td class="py-3 px-2 text-gray-500">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="py-3 px-2 flex gap-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Modifier</a>
                                
                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm">(Vous)</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-4 text-center">Aucun utilisateur trouvé.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>