@extends('layouts.app')

@section('content')
    <div class="space-y-6 p-6">
        <h1 class="text-3xl font-bold text-primary">Bienvenue sur votre Tableau de Bord</h1>
        <p class="text-gray-600 mt-2">Utilisez le menu pour gérer vos propriétés et réservations.</p>

        <div class="mt-6">
            <a href="{{ url('/admin/properties') }}" class="px-4 py-2 bg-primary text-white rounded shadow">
                Gestion des Propriétés
            </a>
            <a href="{{ url('/admin/bookings') }}" class="px-4 py-2 bg-primary text-white rounded shadow ml-4">
                Gestion des Réservations
            </a>
        </div>
    </div>
@endsection
