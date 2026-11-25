<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 1.5rem; font-weight: bold;">
            Détails du PV : {{ $pv->reference }}
        </h2>
    </x-slot>

    <div style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        
        <!-- Cartouche d'informations -->
        <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem;">
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem;">
                <div>
                    <p style="color: gray; font-size: 0.9rem;">Filière</p>
                    <p style="font-weight: bold;">{{ $pv->filiere?->nom ?? 'N/A' }}</p>
                </div>
                <div>
                    <p style="color: gray; font-size: 0.9rem;">Niveau</p>
                    <p style="font-weight: bold;">{{ $pv->niveau?->code ?? 'N/A' }}</p>
                </div>
                <div>
                    <p style="color: gray; font-size: 0.9rem;">Année</p>
                    <p style="font-weight: bold;">{{ $pv->anneeAcademique?->libelle ?? 'N/A' }}</p>
                </div>
                <div>
                    <p style="color: gray; font-size: 0.9rem;">Type / Session</p>
                    <p style="font-weight: bold;">{{ $pv->type_pv }} ({{ $pv->session }})</p>
                </div>
            </div>
        </div>

        <!-- Visionneuse PDF -->
        <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h3 style="font-size: 1.2rem; font-weight: bold;">Aperçu du document</h3>
                <div>
                    <a href="{{ Storage::url($pv->fichier_path) }}" target="_blank" style="padding: 0.5rem 1rem; background: #10b981; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">
                        Ouvrir dans un nouvel onglet
                    </a>
                    <a href="{{ Storage::url($pv->fichier_path) }}" download style="padding: 0.5rem 1rem; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">
                        Télécharger
                    </a>
                </div>
            </div>
            
            <!-- La visionneuse -->
            <div style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 4px; overflow: hidden;">
                <iframe src="{{ Storage::url($pv->fichier_path) }}" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
        </div>

        <!-- Section OCR -->
        <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 1rem;">Transcription OCR</h3>
            
            {{-- CAS 1 : Le traitement est en cours --}}
            @if($pv->ocr && $pv->ocr->statut === 'en_cours')
                <div style="background: #fffbeb; border: 1px solid #f59e0b; padding: 1rem; border-radius: 4px;">
                    <p style="color: #b45309; font-weight: bold; margin: 0;">
                        ⏳ Traitement en cours... 
                    </p>
                    <p style="color: #b45309; font-size: 0.9rem; margin-top: 0.5rem;">
                        Le document est en train d'être analysé. Actualisez la page dans quelques instants.
                    </p>
                </div>

            {{-- CAS 2 : Le traitement est terminé --}}
            @elseif($pv->ocr && $pv->ocr->statut === 'termine')
                <div style="background: #ecfdf5; border: 1px solid #10b981; padding: 1rem; border-radius: 4px;">
                    <p style="color: #047857; font-weight: bold; margin: 0 0 1rem 0;">
                        ✅ Transcription terminée ! ({{ $pv->ocr->matricules->count() }} matricules détectés)
                    </p>
                    
                    @if($pv->ocr->matricules->count() > 0)
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px;">
                            @foreach($pv->ocr->matricules as $matricule)
                                <div style="background: white; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px; font-family: monospace; text-align: center;">
                                    {{ $matricule->matricule }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: #b45309;">Aucun matricule n'a pu être extrait du document.</p>
                    @endif
                </div>

            {{-- CAS 3 : Echec du traitement --}}
            @elseif($pv->ocr && $pv->ocr->statut === 'echoue')
                <div style="background: #fef2f2; border: 1px solid #ef4444; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                    <p style="color: #b91c1c; font-weight: bold; margin: 0;">
                        ❌ La transcription a échoué.
                    </p>
                </div>
                <form action="{{ route('pvs.ocr', $pv) }}" method="POST">
                    @csrf
                    <button type="submit" style="padding: 0.5rem 1rem; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer;">
                        Réessayer la transcription
                    </button>
                </form>

            {{-- CAS 4 : Aucun traitement lancé --}}
            @else
                <p style="color: gray; margin-bottom: 1rem;">Lancez l'OCR pour extraire les matricules automatiquement.</p>
                <form action="{{ route('pvs.ocr', $pv) }}" method="POST">
                    @csrf
                    <button type="submit" style="padding: 0.5rem 1rem; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer;">
                        Lancer la transcription
                    </button>
                </form>
            @endif
        </div>

    </div>
</x-app-layout>