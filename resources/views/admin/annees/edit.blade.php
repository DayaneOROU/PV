@extends('layout')

@section('title', 'Modifier l\'Année Académique - ENEAM')
@section('heading', 'Modifier l\'Année Académique')
@section('subheading', 'Mettre à jour les informations de l\'année')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Modification : {{ $annee->libelle }}</h2>
                <p class="card-box-subtitle">Mettez à jour le libellé de l'année universitaire</p>
            </div>
            <a href="{{ route('admin.annees.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.annees.update', $annee) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="libelle">Libellé de l'année <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="libelle" name="libelle" value="{{ old('libelle', $annee->libelle) }}" class="form-control-custom" required>
                    @error('libelle') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri btn-warn">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Mettre à jour</span>
                    </button>
                    <a href="{{ route('admin.annees.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
