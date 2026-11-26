@extends('layout')

@section('title', 'Nouvel Utilisateur - ENEAM')
@section('heading', 'Nouvel Utilisateur')
@section('subheading', 'Création d\'un compte d\'accès à la plateforme')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Formulaire de création</h2>
                <p class="card-box-subtitle">Renseignez les coordonnées et le niveau de permissions</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">Nom complet <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control-custom" placeholder="ex: Jean Dupont" required>
                    @error('name') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Adresse email <span style="color: #ef4444;">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control-custom" placeholder="ex: j.dupont@eneam.uac.bj" required>
                    @error('email') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="role_id">Rôle attribué <span style="color: #ef4444;">*</span></label>
                    <select id="role_id" name="role_id" class="form-control-custom" required>
                        <option value="">-- Sélectionnez un rôle --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>{{ $role->nom }}</option>
                        @endforeach
                    </select>
                    @error('role_id') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe <span style="color: #ef4444;">*</span></label>
                        <input type="password" id="password" name="password" class="form-control-custom" required>
                        @error('password') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirmer le mot de passe <span style="color: #ef4444;">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control-custom" required>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Créer le compte</span>
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
