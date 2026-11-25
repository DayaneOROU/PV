<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'Utilisateur : {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Adresse Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Rôle</label>
                        <select name="role_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>
                                    {{ $role->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 border-t pt-4 mt-4">
                        <p class="text-sm text-gray-500 mb-2">Laissez vide pour conserver le mot de passe actuel.</p>
                        <label class="block text-gray-700 font-bold mb-2">Nouveau mot de passe</label>
                        <input type="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Mettre à jour</button>
                        <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>