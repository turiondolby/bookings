<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Auth\Access\AuthorizationException;

class ShowBooking extends Component
{
    public $appointment;

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;

        if (request()->token !== $appointment->token) {
            throw new AuthorizationException();
        }
    }

    public function render()
    {
        return view('livewire.show-booking')
            ->layout('layouts.guest');
    }
}
