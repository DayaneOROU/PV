@extends('layout')

@section('title', 'Nouveau Département - ENEAM')
@section('heading', 'Nouveau Département')
@section('subheading', 'Création d\'un département d\'enseignement')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Formulaire de création</h2>
                <p class="card-box-subtitle">Renseignez les détails du nouveau département</p>
            </div>
            <a href="{{ route('admin.departements.index') }}" class="btn-sec">
                <svg class="i" aria-hidden="true"><use href="#arrow-left"/></svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <div class="card-box-body">
            <form action="{{ route('admin.departements.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nom">Nom du département <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control-custom" placeholder="ex: Informatique et Télécommunications" required>
                    @error('nom') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="code">Code ou sigle</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control-custom" placeholder="ex: IT">
                    @error('code') <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--bd);">
                    <button type="submit" class="btn-pri">
                        <svg class="i" aria-hidden="true"><use href="#check-circle"/></svg>
                        <span>Enregistrer le département</span>
                    </button>
                    <a href="{{ route('admin.departements.index') }}" class="btn-sec">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
