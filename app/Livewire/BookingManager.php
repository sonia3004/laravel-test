<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingManager extends Component
{
    public $property_id;
    public $start_date;
    public $end_date;

    protected $rules = [
        'property_id' => 'required|exists:properties,id',
        'start_date'  => 'required|date|after_or_equal:today',
        'end_date'    => 'required|date|after:start_date',
    ];

    #[On('selectProperty')] 
    public function selectProperty($property_id)
    {
        Log::info("🚀 Propriété sélectionnée via Livewire : " . $property_id);

       
        $this->property_id = (int) $property_id;
    }

    public function submitBooking()
    {
        $this->validate();

        if (!Auth::check()) {
            session()->flash('error', 'Vous devez être connecté pour réserver.');
            return;
        }

        $booking = Booking::create([
            'user_id'     => Auth::id(),
            'property_id' => $this->property_id,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
        ]);

        session()->flash('success', 'Réservation effectuée avec succès !');

        
        $this->dispatch('bookingCreated', ['bookingId' => $booking->id]);

        $this->reset(['property_id', 'start_date', 'end_date']);
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties'        => Property::all(),
            'selectedProperty'  => Property::find($this->property_id), 
        ]);
    }
}
