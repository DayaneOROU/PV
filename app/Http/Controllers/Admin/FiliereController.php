<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\Departement;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index() {
        $filieres = Filiere::with('departement')->get();
        return view('admin.filieres.index', compact('filieres'));
    }

    public function create() {
        $departements = Departement::all();
        return view('admin.filieres.create', compact('departements'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
            'code' => 'nullable|string|max:20|unique:filieres,code',
        ]);
        Filiere::create($request->all());
        return redirect()->route('admin.filieres.index')->with('success', 'Filière créée.');
    }

    public function edit(Filiere $filiere) {
        $departements = Departement::all();
        return view('admin.filieres.edit', compact('filiere', 'departements'));
    }

    public function update(Request $request, Filiere $filiere) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
            'code' => 'nullable|string|max:20|unique:filieres,code,' . $filiere->id,
        ]);
        $filiere->update($request->all());
        return redirect()->route('admin.filieres.index')->with('success', 'Filière modifiée.');
    }

    public function destroy(Filiere $filiere) {
        $filiere->delete();
        return redirect()->route('admin.filieres.index')->with('success', 'Filière supprimée.');
    }
}