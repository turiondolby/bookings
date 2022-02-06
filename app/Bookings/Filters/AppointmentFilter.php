<?php

namespace App\Bookings\Filters;

use Carbon\CarbonPeriod;
use App\Bookings\Filter;
use Illuminate\Support\Collection;
use App\Bookings\TimeSlotGenerator;

class AppointmentFilter implements Filter
{
    public $appointments;

    public function __construct(Collection $appointments)
    {
        $this->appointments = $appointments;
    }

    public function apply(TimeSlotGenerator $generator, CarbonPeriod $interval)
    {
        $interval->addFilter(function ($slot) use ($generator) {
            foreach ($this->appointments as $appointment) {
                if (
                    $slot->between(
                        $appointment->date->setTimeFrom(
                            $appointment->start_time->subMinutes($generator->service->duration)
                        ),
                        $appointment->date->setTimeFrom(
                            $appointment->end_time
                        ),
                    )
                ) {
                    return false;
                }
            }

            return true;
        });
    }
}
