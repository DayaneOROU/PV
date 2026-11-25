<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use Illuminate\Http\Request;

class AnneeAcademiqueController extends Controller
{
    public function index() {
        // On trie par libellé au lieu de date_debut
        $annees = AnneeAcademique::orderBy('libelle', 'desc')->get();
        return view('admin.annees.index', compact('annees'));
    }

    public function create() { return view('admin.annees.create'); }
    
    public function store(Request $request) {
        $request->validate([
            'libelle' => 'required|string|max:20|unique:annees_academiques,libelle', 
        ]);
        
        AnneeAcademique::create($request->all());
        return redirect()->route('admin.annees.index')->with('success', 'Année créée.');
    }
    
    public function edit(AnneeAcademique $annee) { return view('admin.annees.edit', compact('annee')); }
    
    public function update(Request $request, AnneeAcademique $annee) {
        $request->validate([
            'libelle' => 'required|string|max:20|unique:annees_academiques,libelle,' . $annee->id,
        ]);
        
        $annee->update($request->all());
        return redirect()->route('admin.annees.index')->with('success', 'Année modifiée.');
    }
    
    public function destroy(AnneeAcademique $annee) {
        $annee->delete();
        return redirect()->route('admin.annees.index')->with('success', 'Année supprimée.');
    }
}