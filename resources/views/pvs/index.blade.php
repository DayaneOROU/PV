<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 1.5rem; font-weight: bold;">
            {{ __('Liste des PV') }}
        </h2>
    </x-slot>

    <div style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        
        <!-- Message de succès -->
        @if(session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bouton d'ajout -->
        <div style="margin-bottom: 1.5rem;">
            <a href="{{ route('pvs.create') }}" style="padding: 0.5rem 1rem; background: #3b82f6; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
                + Importer un nouveau PV
            </a>
        </div>

        <!-- Tableau des PV -->
        <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background: #f3f4f6; border-bottom: 2px solid #e5e7eb;">
                    <tr>
                        <th style="padding: 1rem;">Référence</th>
                        <th style="padding: 1rem;">Filière</th>
                        <th style="padding: 1rem;">Niveau</th>
                        <th style="padding: 1rem;">Année</th>
                        <th style="padding: 1rem;">Type / Session</th>
                        <th style="padding: 1rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pvs as $pv)
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 1rem; font-weight: bold;">{{ $pv->reference }}</td>
                        <td style="padding: 1rem;">{{ $pv->filiere?->nom ?? 'N/A' }}</td>
                        <td style="padding: 1rem;">{{ $pv->niveau?->code ?? 'N/A' }}</td>
                        <td style="padding: 1rem;">{{ $pv->anneeAcademique?->libelle ?? 'N/A' }}</td>
                        <td style="padding: 1rem;">{{ ucfirst($pv->type_pv) }} ({{ ucfirst($pv->session) }})</td>
                        <td style="padding: 1rem;">
                            <a href="{{ route('pvs.show', $pv) }}" style="color: #3b82f6; text-decoration: none; font-weight: bold;">
                                Voir
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 2rem; text-align: center; color: gray;">
                            Aucun PV n'a été importé pour le moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div style="margin-top: 1.5rem;">
            {{ $pvs->links() }}
        </div>

    </div>
</x-app-layout>