<?php

use App\Http\Controllers\ProfileController;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $properties = Property::all();
    return view('properties.index', compact('properties'));
});

// Dashboard accessible uniquement aux utilisateurs authentifiés et vérifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Gestion du profil (uniquement pour les utilisateurs connectés)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route protégée pour l'administration (accessible uniquement aux admins)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (! Auth::user()->is_admin) {
            abort(403, 'Accès refusé.');
        }
        return view('admin.dashboard'); // Vue pour le dashboard admin personnalisé
    })->name('admin.dashboard');
});

// Ajout de la route pour Filament
Route::get('/admin/dashboard', function () {
    return view('filament.pages.dashboard'); 
})->name('filament.admin.pages.dashboard');

require __DIR__.'/auth.php';
