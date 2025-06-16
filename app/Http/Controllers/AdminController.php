<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Salon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function dashboard()
{
    // Count how many salons have completed payment
    $paidSalonCount = Salon::whereNotNull('payment_id')->count();

    // Assuming each payment is ₹100
    $totalRevenue = $paidSalonCount * 100;
     $totalAppointments = Booking::count();
     $totalSalons = Salon::count();

    return view('admin.dashboard', compact('totalRevenue', 'totalAppointments', 'totalSalons'));
}
public function newSalonPayments()
{
    $salons = Salon::whereNotNull('payment_id')->where('is_approved', true)->latest()->get();
    return view('admin.salon_payments', compact('salons'));
}
}
