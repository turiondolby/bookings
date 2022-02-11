<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\CarbonInterval;

class BookingCalendar extends Component
{
    public $date;

    public $calendarStartDate;

    public function mount()
    {
        $this->calendarStartDate = now();
        $this->setDate(now()->timestamp);
    }

    public function setDate($timestamp)
    {
        $this->date = $timestamp;
    }

    public function getCalendarWeekIntervalProperty()
    {
        return CarbonInterval::days(1)
            ->toPeriod(
                $this->calendarStartDate,
                $this->calendarStartDate->clone()->addWeek()
            );
    }

    public function incrementCalendarWeek()
    {
        $this->calendarStartDate->addWeek()->addDay();
    }

    public function decrementCalendarWeek()
    {
        $this->calendarStartDate->subWeek()->subDay();
    }

    public function getWeekIsGreaterThanCurrentProperty()
    {
        return $this->calendarStartDate->gt(now());
    }

    public function render()
    {
        return view('livewire.booking-calendar');
    }
}
