@extends('layout')

@section('title', 'Modifier la Filière - ENEAM')
@section('heading', 'Modifier la Filière')
@section('subheading', 'Mettre à jour les paramètres de la filière')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Modification de la filière : {{ $filiere->nom }}</h2>
                <p class="card-box-subtitle">Mettez à jour les informations ci-dessous</p>
            </div>
            <a href="{{ route('admin.filieres.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.filieres.update', $filiere) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nom">Nom de la filière <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $filiere->nom) }}" class="form-control-custom" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="code">Code de la filière</label>
                    <input type="text" id="code" name="code" value="{{ old('code', $filiere->code) }}" class="form-control-custom">
                    @error('code') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="departement_id">Département de rattachement <span style="color: #ef4444;">*</span></label>
                    <select id="departement_id" name="departement_id" class="form-control-custom" required>
                        @foreach($departements as $dept)
                            <option value="{{ $dept->id }}" @selected(old('departement_id', $filiere->departement_id) == $dept->id)>{{ $dept->nom }}</option>
                        @endforeach
                    </select>
                    @error('departement_id') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri btn-warn">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Mettre à jour</span>
                    </button>
                    <a href="{{ route('admin.filieres.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
