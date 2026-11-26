@extends('layout')

@section('title', 'Modifier l\'Utilisateur - ENEAM')
@section('heading', 'Modifier l\'Utilisateur')
@section('subheading', 'Mettre à jour le profil ou le rôle')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Modification : {{ $user->name }}</h2>
                <p class="card-box-subtitle">Mettez à jour les informations du compte</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="name">Nom complet <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control-custom" required>
                    @error('name') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Adresse email <span style="color: #ef4444;">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control-custom" required>
                    @error('email') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="role_id">Rôle attribué <span style="color: #ef4444;">*</span></label>
                    <select id="role_id" name="role_id" class="form-control-custom" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->nom }}</option>
                        @endforeach
                    </select>
                    @error('role_id') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="background: #f8fafc; border: 1px dashed var(--bd); padding: 18px; border-radius: 12px; margin-top: 24px;">
                    <p style="font-weight: 600; font-size: 13px; color: #475569; margin-bottom: 12px;">Modifier le mot de passe (optionnel)</p>
                    <small style="color: var(--mut); display: block; margin-bottom: 14px;">Laissez ces champs vides si vous ne souhaitez pas modifier le mot de passe actuel.</small>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="password">Nouveau mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control-custom">
                            @error('password') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="password_confirmation">Confirmer</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control-custom">
                        </div>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri btn-warn">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Mettre à jour</span>
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
