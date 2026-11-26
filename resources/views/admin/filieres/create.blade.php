@extends('layout')

@section('title', 'Nouvelle Filière - ENEAM')
@section('heading', 'Nouvelle Filière')
@section('subheading', 'Création d\'une nouvelle filière de formation')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Formulaire de création</h2>
                <p class="card-box-subtitle">Renseignez les informations de la nouvelle filière</p>
            </div>
            <a href="{{ route('admin.filieres.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.filieres.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nom">Nom de la filière <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control-custom" placeholder="ex: Informatique de Gestion" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="code">Code de la filière</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control-custom" placeholder="ex: IG">
                    @error('code') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="departement_id">Département de rattachement <span style="color: #ef4444;">*</span></label>
                    <select id="departement_id" name="departement_id" class="form-control-custom" required>
                        <option value="">-- Sélectionnez un département --</option>
                        @foreach($departements as $dept)
                            <option value="{{ $dept->id }}" @selected(old('departement_id') == $dept->id)>{{ $dept->nom }}</option>
                        @endforeach
                    </select>
                    @error('departement_id') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Enregistrer la filière</span>
                    </button>
                    <a href="{{ route('admin.filieres.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
