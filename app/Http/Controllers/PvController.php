<?php

namespace App\Http\Controllers;

use App\Models\Pv;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Semestre;
use App\Models\AnneeAcademique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PvController extends Controller
{
    // 1. Afficher la liste des PV
    public function index()
    {
        // On récupère les PV avec leurs relations, les plus récents d'abord
        $pvs = Pv::with(['filiere', 'niveau', 'anneeAcademique', 'uploader'])
                 ->latest()
                 ->paginate(10);
                 
        return view('pvs.index', compact('pvs'));
    }

    // 2. Afficher le formulaire de création
    public function create()
    {
        // On récupère les données pour remplir les listes déroulantes
        $filieres = Filiere::orderBy('nom')->get();
        $niveaux = Niveau::orderBy('ordre')->get();
        $semestres = Semestre::orderBy('numero')->get();
        $annees = AnneeAcademique::orderBy('libelle', 'desc')->get();

        return view('pvs.create', compact('filieres', 'niveaux', 'semestres', 'annees'));
    }

    // 3. Enregistrer le nouveau PV
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'filiere_id' => 'required|exists:filieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'semestre_id' => 'nullable|exists:semestres,id',
            'annee_academique_id' => 'required|exists:annees_academiques,id',
            'type_pv' => 'required|in:semestriel,annuel,rattrapage',
            'session' => 'required|in:normale,rattrapage',
            'groupe' => 'nullable|string|max:50',
            'date_deliberation' => 'nullable|date',
            'fichier_pdf' => 'required|mimes:pdf|max:10240', // Max 10Mo
        ]);

        // Gestion de l'upload du PDF
        if ($request->hasFile('fichier_pdf')) {
            $file = $request->file('fichier_pdf');
            // On génère un nom unique basé sur la date et un hash aléatoire
            $filename = date('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // On stocke dans storage/app/public/pvs
            $path = $file->storeAs('pvs', $filename, 'public');
            $validated['fichier_path'] = $path;
        }

        // Ajout des champs manquants
        $validated['reference'] = 'PV-' . strtoupper(Str::random(8)); // Génération d'une référence auto
        $validated['uploaded_by'] = Auth::id();
        $validated['statut'] = 'brouillon';

        // Création dans la base de données
        Pv::create($validated);

        return redirect()->route('pvs.index')
                         ->with('success', 'Le PV a été importé avec succès.');
    }

    // 4. Afficher un PV spécifique
    public function show(Pv $pv)
    {
        return view('pvs.show', compact('pv'));
    }
}