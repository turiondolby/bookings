<?php

namespace App\Bookings;

use Carbon\CarbonPeriod;

interface Filter
{
    public function apply(TimeSlotGenerator $generator, CarbonPeriod $interval);
}
