@extends('layout')

@section('title', 'Utilisateurs - ENEAM')
@section('heading', 'Gestion des Utilisateurs')
@section('subheading', 'Administration des comptes et attributions de rôles')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    @if(session('success'))
        <div class="alert-custom alert-success">
            <svg class="i" style="color: #10b981;" aria-hidden="true"><use href="#check-circle"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="alert-custom alert-error">
            <svg class="i" style="color: #ef4444;" aria-hidden="true"><use href="#trash"/></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="card-box">
        <div class="card-box-header">
            <div>
                <h2 class="card-box-title">Liste des Utilisateurs</h2>
                <p class="card-box-subtitle">Gérez les accès et les permissions de la plateforme</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="btn-pri">
                <svg class="i" aria-hidden="true"><use href="#plus"/></svg>
                <span>Nouvel Utilisateur</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Date d'inscription</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 38px; height: 38px; border-radius: 50%; background: var(--soft); color: var(--pri); display: grid; place-items: center; font-weight: 700; font-size: 14px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span style="font-weight: 600; color: #1e293b; display: block;">{{ $user->name }}</span>
                                    @if(auth()->id() === $user->id)
                                        <span style="font-size: 11px; color: var(--pri2); font-weight: 500;">(Votre session)</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="color: #475569;">{{ $user->email }}</td>
                        <td>
                            <span class="badge-pill" style="background: #eff6ff; color: #1d4ed8; border-color: #bfdbfe;">
                                {{ $user->role->nom ?? 'Aucun rôle' }}
                            </span>
                        </td>
                        <td style="color: #64748b; font-size: 13px;">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td style="text-align: right;">
                            <div style="display: inline-flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn-action" title="Modifier" aria-label="Modifier">
                                    <svg class="i" aria-hidden="true"><use href="#edit"/></svg>
                                </a>
                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-del" title="Supprimer" aria-label="Supprimer">
                                            <svg class="i" aria-hidden="true"><use href="#trash"/></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <svg class="i" aria-hidden="true"><use href="#users"/></svg>
                                <h4>Aucun utilisateur trouvé</h4>
                                <p style="font-size: 13px; margin-top: 4px;">Commencez par inviter ou créer un compte utilisateur.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div style="padding: 16px 24px; border-top: 1px solid var(--bd);">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
