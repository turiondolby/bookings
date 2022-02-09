<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;

class CreateBooking extends Component
{
    public $employees;

    public $state = [
        'service' => '',
        'employee' => '',
    ];

    public function mount()
    {
        $this->employees = collect();
    }

    public function updatedStateService()
    {
        $this->state['employee'] = '';

        $this->employees = $this->selectedService->employees;
    }

    public function getSelectedServiceProperty()
    {
        if (! $this->state['service']) {
            return null;
        }

        return Service::find($this->state['service']);
    }

    public function render()
    {
        $services = Service::all();

        return view('livewire.create-booking', [
            'services' => $services
        ])
            ->layout('layouts.guest');
    }
}
