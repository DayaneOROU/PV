@extends('layout')

@section('title', 'Nouvelle Année Académique - ENEAM')
@section('heading', 'Nouvelle Année Académique')
@section('subheading', 'Création d\'une session universitaire')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Formulaire de création</h2>
                <p class="card-box-subtitle">Définissez le libellé et l'état actif</p>
            </div>
            <a href="{{ route('admin.annees.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.annees.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="libelle">Libellé de l'année <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="libelle" name="libelle" value="{{ old('libelle') }}" class="form-control-custom" placeholder="ex: 2024-2025" required>
                    @error('libelle') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group" style="margin-top: 24px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="est_active" value="1" id="est_active" style="width: 18px; height: 18px; accent-color: var(--pri);" {{ old('est_active') ? 'checked' : '' }}>
                        <span style="font-weight: 600; color: #334155; font-size: 14px;">Définir comme année active par défaut</span>
                    </label>
                    <small style="color: var(--mut); font-size: 12px; margin-left: 28px; display: block; margin-top: 4px;">L'année active est utilisée pour le calcul et l'affichage des nouveaux PV.</small>
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Enregistrer l'année</span>
                    </button>
                    <a href="{{ route('admin.annees.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
