<div class="border p-4 rounded-lg shadow-lg bg-white flex flex-col">
    @if ($property->image)
        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="rounded-lg mb-4 w-full h-56 object-cover">
    @endif

    <h2 class="text-xl font-bold">{{ $property->name }}</h2>
    <p class="text-gray-600">{{ $property->description }}</p>
    <p class="text-secondary font-bold mt-2">{{ $property->price_per_night }} € / nuit</p>

    
    <button class="mt-auto bg-gray-800 text-white px-6 py-2 rounded-lg border border-gray-600 hover:bg-gray-900 transition w-fit mx-auto font-semibold"
        onclick="Livewire.dispatch('selectProperty', { property_id: {{ $property->id }} })">
        Choisir
    </button>
</div>
