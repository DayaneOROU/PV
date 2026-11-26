@extends('layout')

@section('title', 'Modifier le Département - ENEAM')
@section('heading', 'Modifier le Département')
@section('subheading', 'Mettre à jour les informations du département')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Modification : {{ $departement->nom }}</h2>
                <p class="card-box-subtitle">Mettez à jour le nom ou le code</p>
            </div>
            <a href="{{ route('admin.departements.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.departements.update', $departement) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nom">Nom du département <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $departement->nom) }}" class="form-control-custom" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="code">Code ou sigle</label>
                    <input type="text" id="code" name="code" value="{{ old('code', $departement->code) }}" class="form-control-custom">
                    @error('code') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri btn-warn">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Mettre à jour</span>
                    </button>
                    <a href="{{ route('admin.departements.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
