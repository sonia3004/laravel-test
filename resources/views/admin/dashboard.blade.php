@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-primary mb-6">Tableau de bord administrateur</h1>

        <p class="text-gray-700">Bienvenue, {{ Auth::user()->name }} !</p>

        <div class="mt-6">
            <p class="text-gray-600">Gérez vos propriétés et réservations via le panneau d'administration.</p>
            <a href="{{ url('/admin/dashboard') }}" 
               class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-md shadow">
                Accéder à Filament
            </a> 
        </div>
    </div>
@endsection
