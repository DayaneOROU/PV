@extends('layout')

@section('title', 'Modifier le Niveau - ENEAM')
@section('heading', 'Modifier le Niveau')
@section('subheading', 'Mettre à jour les informations du palier')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Modification : {{ $niveau->nom }}</h2>
                <p class="card-box-subtitle">Mettez à jour le nom ou le rang d'affichage</p>
            </div>
            <a href="{{ route('admin.niveaux.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.niveaux.update', $niveau) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nom">Nom du niveau <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $niveau->nom) }}" class="form-control-custom" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="ordre">Ordre numérique <span style="color: #ef4444;">*</span></label>
                    <input type="number" id="ordre" name="ordre" value="{{ old('ordre', $niveau->ordre) }}" class="form-control-custom" required min="1">
                    @error('ordre') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri btn-warn">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Mettre à jour</span>
                    </button>
                    <a href="{{ route('admin.niveaux.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
