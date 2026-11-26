@extends('layout')

@section('title', 'Départements - ENEAM')
@section('heading', 'Gestion des Départements')
@section('subheading', 'Administration des départements académiques')

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
                <h2 class="card-box-title">Liste des Départements</h2>
                <p class="card-box-subtitle">Gérez les départements d'enseignement de l'ENEAM</p>
            </div>
            <a href="{{ route('admin.departements.create') }}" class="btn-pri">
                <svg class="i" aria-hidden="true"><use href="#plus"/></svg>
                <span>Nouveau Département</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Nom du département</th>
                        <th>Code</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departements as $departement)
                    <tr>
                        <td style="font-weight: 600; color: #1e293b;">
                            <div style="display: inline-flex; align-items: center; gap: 8px;">
                                <svg class="i" style="color: var(--pri);" aria-hidden="true"><use href="#building"/></svg>
                                <span>{{ $departement->nom }}</span>
                            </div>
                        </td>
                        <td>
                            @if($departement->code)
                                <span class="badge-pill">{{ $departement->code }}</span>
                            @else
                                <span style="color: #94a3b8;">—</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <div style="display: inline-flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.departements.edit', $departement) }}" class="btn-action" title="Modifier" aria-label="Modifier">
                                    <svg class="i" aria-hidden="true"><use href="#edit"/></svg>
                                </a>
                                <form action="{{ route('admin.departements.destroy', $departement) }}" method="POST" onsubmit="return confirm('Supprimer ce département ?')" style="display: inline;">
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
                                <svg class="i" aria-hidden="true"><use href="#building"/></svg>
                                <h4>Aucun département trouvé</h4>
                                <p style="font-size: 13px; margin-top: 4px;">Créez un premier département pour organiser vos filières.</p>
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
