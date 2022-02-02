<?php

namespace App\Http\Controllers;

class BookingController extends Controller
{
    public function __invoke()
    {
        return view('bookings.create');
    }
}
