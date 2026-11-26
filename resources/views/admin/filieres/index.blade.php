@extends('layout')

@section('title', 'Filières - ENEAM')
@section('heading', 'Gestion des Filières')
@section('subheading', 'Administration des filières académiques de l\'ENEAM')

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
                <h2 class="card-box-title">Liste des Filières</h2>
                <p class="card-box-subtitle">Consultez, ajoutez et gérez les filières universitaires</p>
            </div>
            <a href="{{ route('admin.filieres.create') }}" class="btn-pri">
                <svg class="i" aria-hidden="true"><use href="#plus"/></svg>
                <span>Nouvelle Filière</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Nom de la filière</th>
                        <th>Code</th>
                        <th>Département</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($filieres as $filiere)
                    <tr>
                        <td style="font-weight: 600; color: #1e293b;">
                            {{ $filiere->nom }}
                        </td>
                        <td>
                            @if($filiere->code)
                                <span class="badge-pill">{{ $filiere->code }}</span>
                            @else
                                <span style="color: #94a3b8;">—</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: inline-flex; align-items: center; gap: 6px; color: #475569;">
                                <svg class="i" style="width: 16px; height: 16px; color: #64748b;" aria-hidden="true"><use href="#building"/></svg>
                                <span>{{ $filiere->departement->nom ?? 'Non assigné' }}</span>
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: inline-flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.filieres.edit', $filiere) }}" class="btn-action" title="Modifier" aria-label="Modifier">
                                    <svg class="i" aria-hidden="true"><use href="#edit"/></svg>
                                </a>
                                <form action="{{ route('admin.filieres.destroy', $filiere) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?')" style="display: inline;">
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
                        <td colspan="4">
                            <div class="empty-state">
                                <svg class="i" aria-hidden="true"><use href="#layers"/></svg>
                                <h4>Aucune filière trouvée</h4>
                                <p style="font-size: 13px; margin-top: 4px;">Commencez par ajouter votre première filière académique.</p>
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
