@extends('layout')

@section('title', 'Nouveau Niveau - ENEAM')
@section('heading', 'Nouveau Niveau')
@section('subheading', 'Création d\'un palier académique')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Formulaire de création</h2>
                <p class="card-box-subtitle">Définissez le nom et l'ordre d'affichage du niveau</p>
            </div>
            <a href="{{ route('admin.niveaux.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.niveaux.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nom">Nom du niveau <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control-custom" placeholder="ex: Licence 1 (L1)" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="ordre">Ordre numérique <span style="color: #ef4444;">*</span></label>
                    <input type="number" id="ordre" name="ordre" value="{{ old('ordre') }}" class="form-control-custom" placeholder="ex: 1" required min="1">
                    <small style="color: var(--mut); font-size: 12px; display: block; margin-top: 4px;">Définit la hiérarchie pour le classement (1 pour 1ère année, 2 pour 2ème année, etc.)</small>
                    @error('ordre') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Enregistrer le niveau</span>
                    </button>
                    <a href="{{ route('admin.niveaux.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
