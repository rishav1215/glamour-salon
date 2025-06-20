<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SalonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('custom.register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('custom.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated users
Route::middleware('auth')->group(function () {

    // Customer dashboard
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });

    // Salon owner dashboard (via controller)
    Route::get('/salonsOwner/dashboard', [AuthController::class, 'index'])->name('salonsOwner.dashboard');

    // Admin dashboard (can be controlled separately below)
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    // Salon creation & payment
    Route::get('/salon/create', [SalonController::class, 'create'])->name('salon.create');
    Route::post('/salon/store', [SalonController::class, 'store'])->name('salon.store');
    Route::get('/salon/payment/{salon}', [SalonController::class, 'payment'])->name('salon.payment');
    Route::post('/salon/payment/verify', [SalonController::class, 'verifyPayment'])->name('salon.payment.verify');

    // Booking routes
    Route::get('/bookings/create/{salon}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');

    // Appointments for salon owner
    Route::get('/owner/appointments', [BookingController::class, 'salonAppointments'])->name('salonsOwner.appointment');
});

// Admin-only
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   

});

// Appointment resource (if needed)
Route::middleware(['auth'])->group(function () {
    Route::resource('appointments', \App\Http\Controllers\Admin\AppointmentController::class);
     Route::patch('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
});