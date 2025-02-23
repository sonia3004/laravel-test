@extends('layouts.app')

@section('content')
<div class="container mx-auto px-10 lg:px-20 p-6">
    <div class="flex justify-end mb-6">
        <a href="{{ url('/login') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
            Se connecter
        </a>
    </div>

    
    <h2 class="text-2xl font-bold text-primary mb-4 text-center">
        Pour réserver, veuillez choisir une propriété ci-dessous.
    </h2>

    
    <div class="mb-12 flex flex-col items-center w-full">
        <div class="w-full max-w-7xl bg-white p-12 rounded-lg shadow-md relative">
            <div class="w-full" style="margin-top: -30px; margin-bottom: 30px;">
                @livewire('booking-manager')
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
        @foreach($properties as $property)
            <x-property-card :property="$property" />
        @endforeach
    </div>
</div>
@endsection
