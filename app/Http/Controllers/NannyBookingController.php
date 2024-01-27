<?php

namespace App\Http\Controllers;

use App\Models\NannyBooking;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\Utils;

class NannyBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = NannyBooking::with('user:id,name,email');
        $nannyBookings = Utils::filter($query, $request)->get();

        return Inertia::render('NannyBooking', [
            'nannyBookings' => $nannyBookings,
            'activeFilters' => $request->only(['title', 'minPrice', 'maxPrice', 'date', 'userName', 'userEmail'])
        ]);
    }
}
