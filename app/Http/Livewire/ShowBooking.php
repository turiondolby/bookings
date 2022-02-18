<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class ShowBooking extends Component
{
    public $appointment;

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }
    public function render()
    {
        return view('livewire.show-booking')
            ->layout('layouts.guest');
    }
}
