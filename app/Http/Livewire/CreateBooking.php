<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateBooking extends Component
{
    public function render()
    {
        return view('livewire.create-booking')
            ->layout('layouts.guest');
    }
}
