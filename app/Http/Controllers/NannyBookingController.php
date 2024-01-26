<?php

namespace App\Http\Controllers;

use App\Models\NannyBooking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NannyBookingController extends Controller
{
    public function index()
    {
        $nannyBookings = NannyBooking::with('user:id,name,email')->get();

        return Inertia::render('NannyBooking', [
            'nannyBookings' => $nannyBookings,
        ]);
    }
}
