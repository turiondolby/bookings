<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use App\Bookings\TimeSlotGenerator;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(3);
        $service = Service::find(1);

        $slots = (new TimeSlotGenerator($schedule, $service))->get();

        return view('bookings.create', compact('slots'));
    }
}
