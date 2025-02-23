<div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg mt-16 border-8">

    <h2 class="text-2xl font-bold mb-4 text-primary">Réservez une propriété</h2>

    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-200 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Propriété sélectionnée</label>
        <input type="text" value="{{ $selectedProperty ? $selectedProperty->name : 'Aucune sélectionnée' }}" 
            disabled class="w-full p-2 border border-gray-300 rounded bg-gray-100">
    </div>

    <form wire:submit.prevent="submitBooking">
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" wire:model="start_date" id="start_date" class="w-full p-2 border border-gray-300 rounded">
            @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" wire:model="end_date" id="end_date" class="w-full p-2 border border-gray-300 rounded">
            @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" 
            class="w-full bg-blue-500 text-white p-2 rounded"
            wire:loading.attr="disabled">
            Confirmer la réservation
        </button>

        <p class="text-gray-500 text-sm mt-2" wire:loading>Traitement en cours...</p>
    </form>
</>
