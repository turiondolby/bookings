<?php

namespace App\Bookings;

use App\Models\Schedule;
use Carbon\CarbonInterval;

class TimeSlotGenerator
{
    public const INCREMENT = 15;
    protected $interval;

    public function __construct(Schedule $schedule)
    {
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
            ->toPeriod(
                $schedule->date->setTimeFrom($schedule->start_time),
                $schedule->date->setTimeFrom($schedule->end_time)
            );
    }

    public function get()
    {
        return $this->interval;
    }
}
