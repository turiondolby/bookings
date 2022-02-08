<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;

class CreateBooking extends Component
{
    public $state = [
        'service' => null
    ];

    public function render()
    {
        $services = Service::all();

        return view('livewire.create-booking', [
            'services' => $services
        ])
            ->layout('layouts.guest');
    }
}
