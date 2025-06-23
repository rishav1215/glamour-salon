<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
