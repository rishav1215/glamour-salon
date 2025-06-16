<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    
   public function create($salonId)
    {
        $salon = Salon::findOrFail($salonId);
        return view('bookings.create', compact('salon'));
    }

    // Add your store method here as well
    public function store(Request $request)
    {
        $request->validate([
            'salon_id' => 'required|exists:salons,id',
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'appointment_time' => 'required|date|after_or_equal:now',
        ]);

        \App\Models\Booking::create([
            'salon_id' => $request->salon_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => auth()->user()->email,
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('home')->with('success', 'Appointment booked successfully!');
    }
}
