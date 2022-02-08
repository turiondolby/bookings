<div class="bg-gray-200 max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form>
        {{ var_dump($state) }}
        <label for="service" class="inline-block text-gray-700 font-bold mb-2">Select service</label>
        <select wire:model="state.service" name="service" id="service" class="bg-white h-10 w-full border-none rounded-lg">
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </form>
</div>
