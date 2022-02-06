<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Schedule;
use App\Models\Employee;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(1);
        $service = Service::find(1);

        $employee = Employee::find(1);

        $slots = $employee->availableTimeSlots($schedule, $service);

        return view('bookings.create', compact('slots'));
    }
}
