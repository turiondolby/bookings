<div class="bg-gray-200 max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form wire:submit.prevent="createBooking">

        <div class="mb-6">
            <label for="service" class="inline-block text-gray-700 font-bold mb-2">Select service</label>
            <select wire:model="state.service" name="service" id="service"
                    class="bg-white h-10 w-full border-none rounded-lg"
            >
                <option value="">Select a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->duration }} minutes)</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 {{ !$employees->count() ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block text-gray-700 font-bold mb-2">Select employee</label>
            <select wire:model="state.employee" {{ !$employees->count() ? 'disabled="disabled"' : '' }}
            name="employee" id="employee" class="bg-white h-10 w-full border-none rounded-lg"
            >
                <option value="">Select an employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 {{ ! $this->selectedService || !$this->selectedEmployee  ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block text-gray-700 font-bold mb-2">Select appointment type</label>
            <livewire:booking-calendar :service="$this->selectedService" :employee="$this->selectedEmployee"
                                       :key="optional($this->selectedEmployee)->id"
            />
        </div>

        @if ($this->hasDetailsToBook)
            <div class="mb-6">
                <div class="text-gray-700 font-bold mb-2">
                    You're ready to book
                </div>

                <div class="border-t border-b border-gray-300 py-2">
                    {{ $this->selectedService->name }} ({{ $this->selectedService->duration }} minutes) with {{ $this->selectedEmployee->name }}
                    <br> on {{ $this->timeObject->format('D jS M Y') }} at {{ $this->timeObject->format('g:i A') }}
                </div>
            </div>

            <div class="mb-6">
                <div class="mb-3">
                    <label for="name" class="inline-block text-gray-700 font-bold mb-2">Your name</label>
                    <input wire:model.defer="state.name" type="text" name="name" id="name" class="bg-white h-10 w-full border-none rounded-lg">
                </div>

                <div class="mb-3">
                    <label for="email" class="inline-block text-gray-700 font-bold mb-2">Your email</label>
                    <input wire:model.defer="state.email" type="text" name="email" id="email" class="bg-white h-10 w-full border-none rounded-lg">
                </div>
            </div>

            <button type="submit" class="bg-indigo-500 text-white h-11 px-4 text-center font-bold rounded-lg w-full">
                Book now
            </button>
        @endif

    </form>
</div>
