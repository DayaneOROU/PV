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
            <h3 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0.5rem;">Transcription OCR</h3>
            <p style="color: gray; margin-bottom: 1rem;">Cette fonctionnalité sera bientôt disponible.</p>
            <button disabled style="padding: 0.5rem 1rem; background: #e5e7eb; color: #9ca3af; border: none; border-radius: 4px; cursor: not-allowed;">
                Lancer la transcription (Bientôt)
            </button>
        </div>

    </div>
</x-app-layout>