<div class="bg-gray-200 max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form>

        <div class="mb-6">
            <label for="service" class="inline-block text-gray-700 font-bold mb-2">Select service</label>
            <select wire:model="state.service" name="service" id="service"
                    class="bg-white h-10 w-full border-none rounded-lg"
            >
                <option value="">Select a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
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


    </form>
</div>
