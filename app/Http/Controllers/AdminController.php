<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Sabhi Bookings laao jo appointments hain
        $appointments = Booking::latest()->paginate(10);

        return view('admin.appointments.index', compact('appointments'));
    }
    public function manageSalon()
    {
        $salonOwners = User::where('role', 'salon_owner')->get();
        return view('admin.manageSalon', compact('salonOwners'));
    }

    // public function show(Booking $appointment)   
    // {
    //     return view('admin.appointments.show', compact('appointment'));
    // }

    public function showSalon($id)
{
    $salonOwner = User::where('role', 'salon_owner')->findOrFail($id);

    return view('admin.showSalon', compact('salonOwner'));
}

public function editSalon($id)
{
    $salonOwner = User::where('role', 'salon_owner')->findOrFail($id);
    return view('admin.editSalon', compact('salonOwner'));
}

public function updateSalon(Request $request, $id)
{
    $salonOwner = User::where('role', 'salon_owner')->findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'salon_name' => 'nullable|string',
        'city' => 'nullable|string',
        'state' => 'nullable|string',
        'status' => 'required|in:active,pending,inactive',
    ]);

    $salonOwner->update($request->only(['name', 'email', 'salon_name', 'city', 'state', 'status']));

    return redirect()->route('admin.manageSalon')->with('success', 'Salon updated successfully.');
}


public function blockSalon($id)
{
    $salonOwner = User::where('role', 'salon_owner')->findOrFail($id);
    $salonOwner->status = 'inactive';
    $salonOwner->save();

    Salon::where('user_id', $salonOwner->id)->update(['status' => 'inactive']);

    return redirect()->route('admin.manageSalon')->with('success', 'Salon and owner blocked successfully.');
}


public function analytics(){
     $paidSalonCount = Salon::whereNotNull('payment_id')->count();
     $totalRevenue = $paidSalonCount  * 200;
     $totalAppointments = Booking::count();
     $totalSalons = Salon::count();
     $users = User::count();
    return view('admin.analytics', compact('totalRevenue', 'totalAppointments', 'totalSalons', 'users')  );
}


public function dashboard()
{
    // Count how many salons have completed payment
    $paidSalonCount = Salon::whereNotNull('payment_id')->count();

    // Assuming each payment is ₹100
    $totalRevenue = $paidSalonCount * 200;
     $totalAppointments = Booking::count();
     $totalSalons = Salon::count();
     $users = User::count();
    

    return view('admin.dashboard', compact('totalRevenue', 'totalAppointments', 'totalSalons', 'users'));
}
public function newSalonPayments()
{
    $salons = Salon::whereNotNull('payment_id')->where('is_approved', true)->latest()->get();
    return view('admin.salon_payments', compact('salons'));
}


public function setting(){
    return view('admin.setting');
}

}
