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
Route::middleware(['auth'])->group(function () {
    Route::resource('appointments', AppointmentController::class);
});
Route::get('/login', function () {
    return 'Login page here';
})->name('login');

 
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('custom.register');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('custom.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });

    Route::get('/salonsOwner/dashboard', function () {
        return view('salonsOwner.dashboard');
    });
     Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::get('/salon/create', [SalonController::class, 'create'])->name('salon.create');
    Route::post('/salon/store', [SalonController::class, 'store'])->name('salon.store');

    Route::get('/salon/payment/{salon}', [SalonController::class, 'payment'])->name('salon.payment');
    Route::post('/salon/payment/verify', [SalonController::class, 'verifyPayment'])->name('salon.payment.verify');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/bookings/create/{salon}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::get('/salonsOwner', function () {
    return view('slonsOwner.appointment');
})->name('salonsOwner.appointment');
