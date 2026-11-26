@extends('layout')

@section('title', 'Tableau de bord - ENEAM')
@section('heading', 'Tableau de bord')
@section('subheading', 'Plateforme de gestion académique et des procès-verbaux')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <div class="card-box" style="background: linear-gradient(135deg, var(--pri), #132742); color: #fff; border: none; padding: 32px;">
        <div style="max-width: 650px;">
            <span style="background: rgba(255,255,255,0.15); font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; display: inline-block; margin-bottom: 12px;">
                Année Académique Active
            </span>
            <h2 style="font: 700 28px 'EB Garamond', serif; margin-bottom: 8px; color: #fff;">
                Bienvenue sur la plateforme ENEAM, {{ Auth::user()->name }}
            </h2>
            <p style="font-size: 14px; color: #cbd5e1; line-height: 1.6;">
                Gérez facilement les départements, les filières, les niveaux d'études et la saisie des procès-verbaux académiques.
            </p>
        </div>
    </div>

    <!-- Raccourcis d'administration -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
        
        <div class="card-box" style="padding: 22px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-weight: 600; color: #475569; font-size: 13px;">DÉPARTEMENTS</span>
                <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--soft); color: var(--pri); display: grid; place-items: center;">
                    <svg class="i" aria-hidden="true"><use href="#building"/></svg>
                </div>
            </div>
            <a href="{{ route('admin.departements.index') }}" class="btn-pri" style="width: 100%; justify-content: center; font-size: 13px; padding: 8px 14px; margin-top: 8px;">
                Gérer les départements
            </a>
        </div>

        <div class="card-box" style="padding: 22px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-weight: 600; color: #475569; font-size: 13px;">FILIÈRES</span>
                <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--soft); color: var(--pri); display: grid; place-items: center;">
                    <svg class="i" aria-hidden="true"><use href="#layers"/></svg>
                </div>
            </div>
            <a href="{{ route('admin.filieres.index') }}" class="btn-pri" style="width: 100%; justify-content: center; font-size: 13px; padding: 8px 14px; margin-top: 8px;">
                Gérer les filières
            </a>
        </div>

        <div class="card-box" style="padding: 22px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-weight: 600; color: #475569; font-size: 13px;">NIVEAUX D'ÉTUDES</span>
                <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--soft); color: var(--pri); display: grid; place-items: center;">
                    <svg class="i" aria-hidden="true"><use href="#cap"/></svg>
                </div>
            </div>
            <a href="{{ route('admin.niveaux.index') }}" class="btn-pri" style="width: 100%; justify-content: center; font-size: 13px; padding: 8px 14px; margin-top: 8px;">
                Gérer les niveaux
            </a>
        </div>

        <div class="card-box" style="padding: 22px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-weight: 600; color: #475569; font-size: 13px;">ANNÉES ACADÉMIQUES</span>
                <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--soft); color: var(--pri); display: grid; place-items: center;">
                    <svg class="i" aria-hidden="true"><use href="#calendar"/></svg>
                </div>
            </div>
            <a href="{{ route('admin.annees.index') }}" class="btn-pri" style="width: 100%; justify-content: center; font-size: 13px; padding: 8px 14px; margin-top: 8px;">
                Gérer les sessions
            </a>
        </div>

    </div>

</div>
@endsection
