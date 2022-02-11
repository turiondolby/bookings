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

        <div class="mb-6 {{ ! $this->selectedService || !$this->selectedEmployee  ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block text-gray-700 font-bold mb-2">Select appointment type</label>

        </div>

        <div class="bg-white rounded-lg">
            <div class="flex items-center justify-center relative">
                <button type="button" class="p-4 absolute left-0 top-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 hover:text-gray-700"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <div class="text-lg font-semibold p-4">
                    Jan 2021
                </div>

                <button type="button" class="p-4 absolute right-0 top-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 hover:text-gray-700"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <div class="flex justify-between items-center px-3 border-b border-gray-200 pb-2">
                <button type="button" class="text-center group cusor-pointer focus:outline-none">
                    <div class="text-xs leading-none mb-2 text-gray-700">
                        Mon
                    </div>
                    <div
                        class="text-lg leading-none p-1 rounded-full w-9 h-9 group-hover:bg-gray-200 flex items-center justify-center">
                        01
                    </div>
                </button>
            </div>

            <div class="max-h-52 overflow-y-scroll">
                <input type="radio" name="time" id="" value="" class="sr-only">
                <label for=""
                       class="w-full text-left focus:outline-none px-4 py-2 cursor-pointer flex items-center border-b border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-700" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"/>
                    </svg>

                    9:00am
                </label>

                <div class="text-center text-gray-700 px-4 py-2">
                    No available slots
                </div>
            </div>
        </div>


    </form>
</div>
