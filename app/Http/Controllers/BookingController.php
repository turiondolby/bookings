<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use App\Bookings\TimeSlotGenerator;
use App\Bookings\Filters\SlotsPassedTodayFilter;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(2);
        $service = Service::find(1);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter()
            ])
            ->get();

        return view('bookings.create', compact('slots'));
    }
}
