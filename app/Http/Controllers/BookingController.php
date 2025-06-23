<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentBooked;
use App\Models\Booking;
use App\Models\Salon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

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
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
        'email' => auth()->check() ? 'nullable' : 'required|email',
    ]);

    $appointmentDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->appointment_date . ' ' . $request->appointment_time);

    // ✅ Save the booking and assign it to a variable
    $booking = Booking::create([
        'salon_id' => $request->salon_id,
        'user_id' => auth()->check() ? auth()->id() : null,
        'name' => $request->name,
        'contact' => $request->contact,
        'email' => auth()->check() ? auth()->user()->email : $request->email,
        'appointment_time' => $appointmentDateTime,
        'notes' => $request->notes,
    ]);

    // ✅ Send email to salon owner
    $salonOwner = $booking->salon->user;
    if ($salonOwner && $salonOwner->email) {
        Mail::to($salonOwner->email)->send(new AppointmentBooked($booking));
    }

    return redirect()->route('home')->with('success', 'Appointment booked successfully!');
}

public function salonAppointments()
{
    $salon = \App\Models\Salon::where('user_id', auth()->id())->first();

    if (!$salon) {
        return redirect()->route('salon.create')->with('error', 'Please register your salon first.');
    }

    $bookings = $salon->bookings()->latest()->get();

    return view('salonsOwner.appointment', compact('salon', 'bookings'));
}
public function approve(Booking $booking)
{
    // Ensure the user owns the salon this booking is for
    $salon = $booking->salon;
    if ($salon->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $booking->update([
        'status' => 'approved'
    ]);

    return back()->with('success', 'Appointment approved successfully.');
}
}
