@extends('layout')

@section('title', 'Années Académiques - ENEAM')
@section('heading', 'Années Académiques')
@section('subheading', 'Gestion et activation des années universitaires')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    @if(session('success'))
        <div class="alert-custom alert-success">
            <svg class="i" style="color: #10b981;" aria-hidden="true"><use href="#check-circle"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Liste des Années Académiques</h2>
                <p class="card-box-subtitle">Définissez l'année active sur laquelle portent les procès-verbaux</p>
            </div>
            <a href="{{ route('admin.annees.create') }}" class="btn-pri">
                <svg class="i" aria-hidden="true"><use href="#plus"/></svg>
                <span>Nouvelle Année</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Libellé de l'année</th>
                        <th>Statut</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($annees as $annee)
                    <tr>
                        <td style="font-weight: 600; color: #1e293b; font-size: 15px;">
                            <div style="display: inline-flex; align-items: center; gap: 8px;">
                                <svg class="i" style="color: var(--pri);" aria-hidden="true"><use href="#calendar"/></svg>
                                <span>{{ $annee->libelle }}</span>
                            </div>
                        </td>
                        <td>
                            @if($annee->est_active)
                                <span class="badge-status badge-active">
                                    <span style="width: 7px; height: 7px; border-radius: 50%; background: #16a34a;"></span>
                                    En cours (Active)
                                </span>
                            @else
                                <span class="badge-status badge-inactive">
                                    <span style="width: 7px; height: 7px; border-radius: 50%; background: #94a3b8;"></span>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <div style="display: inline-flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.annees.edit', $annee) }}" class="btn-action" title="Modifier" aria-label="Modifier">
                                    <svg class="i" aria-hidden="true"><use href="#edit"/></svg>
                                </a>
                                <form action="{{ route('admin.annees.destroy', $annee) }}" method="POST" onsubmit="return confirm('Supprimer cette année académique ?')" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action btn-action-del" title="Supprimer" aria-label="Supprimer">
                                        <svg class="i" aria-hidden="true"><use href="#trash"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <svg class="i" aria-hidden="true"><use href="#calendar"/></svg>
                                <h4>Aucune année enregistrée</h4>
                                <p style="font-size: 13px; margin-top: 4px;">Créez la première année académique pour démarrer la gestion.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
