<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index() {
        $niveaux = Niveau::orderBy('ordre')->get();
        return view('admin.niveaux.index', compact('niveaux'));
    }

    public function create() { 
        return view('admin.niveaux.create'); 
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255|unique:niveaux,nom',
            'ordre' => 'required|integer'
        ]);
        Niveau::create($request->all());
        return redirect()->route('admin.niveaux.index')->with('success', 'Niveau créé.');
    }

    public function edit(Niveau $niveau) { 
        return view('admin.niveaux.edit', compact('niveau')); 
    }

    public function update(Request $request, Niveau $niveau) {
        $request->validate([
            'nom' => 'required|string|max:255|unique:niveaux,nom,' . $niveau->id,
            'ordre' => 'required|integer'
        ]);
        $niveau->update($request->all());
        return redirect()->route('admin.niveaux.index')->with('success', 'Niveau modifié.');
    }

    public function destroy(Niveau $niveau) {
        $niveau->delete();
        return redirect()->route('admin.niveaux.index')->with('success', 'Niveau supprimé.');
    }
}