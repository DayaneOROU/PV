<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvel Utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Adresse Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Rôle</label>
                        <select name="role_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Choisir un rôle --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                    {{ $role->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Mot de passe</label>
                        <input type="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Créer l'utilisateur</button>
                        <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>