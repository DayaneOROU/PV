<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\FiliereController;
use App\Http\Controllers\Admin\NiveauController;
use App\Http\Controllers\Admin\AnneeAcademiqueController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Routes de profil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- ROUTES ADMIN ---
    // On ajoute le préfixe d'URL 'admin' et le préfixe de nom 'admin.'
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
        
        // Tu pourras ajouter tes autres routes ici plus tard :
        // Route::resource('departements', DepartementController::class);
        // Route::resource('filieres', FiliereController::class);
        // etc.
    });
});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    
    // Les nouveaux CRUD
    Route::resource('departements', DepartementController::class);
    Route::resource('filieres', FiliereController::class);
    Route::resource('niveaux', NiveauController::class);
    Route::resource('annees', AnneeAcademiqueController::class); 
});
require __DIR__.'/auth.php';