<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 1.5rem; font-weight: bold;">
            {{ __('Importer un nouveau PV') }}
        </h2>
    </x-slot>

    <div style="max-width: 800px; margin: 2rem auto; padding: 0 1rem;">
        <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 2rem;">
            
            <!-- Affichage des erreurs de validation -->
            @if ($errors->any())
                <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem;">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pvs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    
                    <!-- Filière -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Filière *</label>
                        <select name="filiere_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" required>
                            <option value="">Sélectionner une filière...</option>
                            @foreach($filieres as $filiere)
                                <option value="{{ $filiere->id }}">{{ $filiere->nom }} ({{ $filiere->code }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Niveau -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Niveau *</label>
                        <select name="niveau_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" required>
                            <option value="">Sélectionner un niveau...</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Année Académique -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Année Académique *</label>
                        <select name="annee_academique_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" required>
                            <option value="">Sélectionner une année...</option>
                            @foreach($annees as $annee)
                                <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Semestre -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Semestre (Optionnel)</label>
                        <select name="semestre_id" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Annuel / Aucun</option>
                            @foreach($semestres as $semestre)
                                <option value="{{ $semestre->id }}">Semestre {{ $semestre->numero }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type de PV -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Type de PV *</label>
                        <select name="type_pv" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" required>
                            <option value="semestriel">Semestriel</option>
                            <option value="annuel">Annuel</option>
                            <option value="rattrapage">Rattrapage</option>
                        </select>
                    </div>

                    <!-- Session -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Session *</label>
                        <select name="session" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" required>
                            <option value="normale">Normale</option>
                            <option value="rattrapage">Rattrapage</option>
                        </select>
                    </div>
                    
                    <!-- Groupe -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Groupe / Spécialité (Optionnel)</label>
                        <input type="text" name="groupe" placeholder="Ex: AIP, Tronc Commun..." style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <!-- Date Délibération -->
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Date de délibération (Optionnel)</label>
                        <input type="date" name="date_deliberation" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                </div>

                <!-- Upload PDF -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Fichier du PV (PDF uniquement) *</label>
                    <input type="file" name="fichier_pdf" accept=".pdf" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; background: #fafafa;" required>
                </div>

                <!-- Boutons d'action -->
                <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="{{ route('pvs.index') }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #4b5563; font-weight: bold; border: 1px solid #ccc; border-radius: 4px;">
                        Annuler
                    </a>
                    <button type="submit" style="padding: 0.5rem 1rem; background: #3b82f6; color: white; font-weight: bold; border: none; border-radius: 4px; cursor: pointer;">
                        Importer le PV
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>