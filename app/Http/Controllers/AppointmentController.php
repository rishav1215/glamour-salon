<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'appointment_time' => 'required|date|after:now',
        ]);

        $appointment = Appointments::create([
            'customer_id' => auth()->id(),
            'salon_owner_id' => $request->salon_owner_id,
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment requested successfully.');
    }

    public function index()
    {
        $appointments = auth()->user()->appointments;
        return view('appointments.index', compact('appointments'));
    }

   public function show(Appointments $appointment)
{
    $this->authorize('view', $appointment); // Will call view() from policy
    return view('appointments.show', compact('appointment'));
}

public function update(Request $request, Appointments $appointment)
{
    $this->authorize('update', $appointment); // Will call update() from policy

    $appointment->update([
        'status' => $request->status,
        'appointment_time' => $request->status == 'time_changed' ? $request->new_time : $appointment->appointment_time,
    ]);

    return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
}
}
