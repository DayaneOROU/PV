@extends('layout')

@section('title', 'Niveaux - ENEAM')
@section('heading', 'Gestion des Niveaux')
@section('subheading', 'Administration des niveaux d\'études (Licence, Master, etc.)')

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
                <h2 class="card-box-title">Liste des Niveaux</h2>
                <p class="card-box-subtitle">Gérez la progression et l'ordre des années d'études</p>
            </div>
            <a href="{{ route('admin.niveaux.create') }}" class="btn-pri">
                <svg class="i" aria-hidden="true"><use href="#plus"/></svg>
                <span>Nouveau Niveau</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 120px;">Ordre</th>
                        <th>Nom du Niveau</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($niveaux as $niveau)
                    <tr>
                        <td>
                            <span class="badge-pill" style="font-weight: 700; background: #e2e8f0; color: #334155; border-color: #cbd5e1;">
                                Rang {{ $niveau->ordre }}
                            </span>
                        </td>
                        <td style="font-weight: 600; color: #1e293b; font-size: 15px;">
                            {{ $niveau->nom }}
                        </td>
                        <td style="text-align: right;">
                            <div style="display: inline-flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.niveaux.edit', $niveau) }}" class="btn-action" title="Modifier" aria-label="Modifier">
                                    <svg class="i" aria-hidden="true"><use href="#edit"/></svg>
                                </a>
                                <form action="{{ route('admin.niveaux.destroy', $niveau) }}" method="POST" onsubmit="return confirm('Supprimer ce niveau ?')" style="display: inline;">
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
                                <svg class="i" aria-hidden="true"><use href="#cap"/></svg>
                                <h4>Aucun niveau trouvé</h4>
                                <p style="font-size: 13px; margin-top: 4px;">Ajoutez des niveaux d'études pour structurer vos parcours.</p>
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
