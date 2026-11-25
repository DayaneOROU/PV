<x-app-layout>
    <div style="max-width: 800px; margin: 2rem auto; padding: 0 1rem;">
        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Rechercher un étudiant par matricule</h2>
        
        <form action="{{ route('pvs.recherche') }}" method="GET" style="display: flex; gap: 10px; margin-bottom: 2rem;">
            <input type="text" name="matricule" value="{{ $matricule }}" placeholder="Ex: 14439424" style="flex: 1; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 0.5rem 1rem; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Rechercher
            </button>
        </form>

        @if($matricule)
            <h3>Résultats pour "{{ $matricule }}" :</h3>
            @if($pvs->isEmpty())
                <p>Aucun PV trouvé pour ce matricule.</p>
            @else
                <ul>
                    @foreach($pvs as $pv)
                        <li>
                            <a href="{{ route('pvs.show', $pv) }}">{{ $pv->reference }}</a> 
                            ({{ $pv->filiere->nom }} - {{ $pv->anneeAcademique->libelle }})
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
</x-app-layout>