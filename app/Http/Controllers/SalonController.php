<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalonRegistered;

class SalonController extends Controller
{
   public function create()
{
    return view('salon.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image',
        'location' => 'required',
        'services' => 'required',
    ]);

    $path = $request->file('image')->store('salon_images', 'public');

    $salon = Salon::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'description' => $request->description,
        'location' => $request->location,
        'image' => $path,
        'services' => $request->services,
        'is_approved' => false, // Will approve after payment
    ]);

    return redirect()->route('salon.payment', $salon->id);
}

public function payment(Salon $salon)
{
    // Razorpay keys (put in .env)
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    $order = $api->order->create([
        'receipt' => 'salon_order_' . $salon->id,
        'amount' => 10000, // Rs.100.00
        'currency' => 'INR',
    ]);

    return view('salon.payment', [
        'order_id' => $order->id,
        'salon' => $salon,
        'amount' => 10000,
        'razorpay_key' => env('RAZORPAY_KEY'),
    ]);
}

public function verifyPayment(Request $request)
{
    $salon = Salon::findOrFail($request->salon_id);

    // Save payment ID
    $salon->payment_id = $request->razorpay_payment_id;
    $salon->is_approved = true;
    $salon->save();

    // Notify admin (optional - via email or dashboard flag)
    // Example: Notify a specific admin email
    \Mail::raw("New salon registered: {$salon->name}, Payment ID: {$salon->payment_id}", function ($message) {
        $message->to('admin@example.com')
                ->subject('New Salon Registration with Payment');
    });

    return redirect()->route('home')->with('success', 'Payment successful. Salon registered!');
}
public function appointments()
{
    $salon = auth()->user()->salon;
    $bookings = $salon ? $salon->bookings()->orderBy('appointment_time', 'asc')->get() : collect();

    return view('salonsOwner.appointment', compact('salon', 'bookings'));
}


}
