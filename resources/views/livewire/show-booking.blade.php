<div class="bg-gray-200 max-w-sm mx-auto m-6 p-5 rounded-lg">
    <div class="mb-6">
        <div class="text-gray-700 font-bold mb-2">
            {{ $appointment->client_name }}, thanks for your booking.
        </div>

        <div class="border-t border-b border-gray-300 py-2">
            <div class="font-semibold">
                {{ $appointment->service->name }} ({{ $appointment->service->duration }} minutes)
                with {{ $appointment->employee->name }}
            </div>
            <div class="text-gray-700">
                on {{ $appointment->date->format('D jS M Y') }} at {{ $appointment->start_time->format('g:i A') }}
            </div>
        </div>
    </div>

    @if (! $appointment->isCancelled())
        <button
            type="button"
            class="bg-pink-500 text-white h-11 px-4 text-center font-bold rounded-lg w-full"
            x-data="{
                confirmCancellation () {
                    if (window.confirm('Are you sure?')) {
                        @this.call('cancelBooking')
                    }
                }
            }"
            x-on:click="confirmCancellation"
        >
            Cancel booking
        </button>
    @endif

    @if ($appointment->isCancelled())
        <p>Your booking has been cancelled.</p>
    @endif
</div>
