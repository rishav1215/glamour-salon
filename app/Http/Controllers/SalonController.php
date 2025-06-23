<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;

use Razorpay\Api\Errors\SignatureVerificationError;

class SalonController extends Controller
{ public function create()
    {
        return view('salon.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'description' => 'required',
            'owner_name' => 'required|string',
            'owner_email' => 'required|email',
            'owner_image' => 'required|image',
            'image' => 'required|image',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'services' => 'required',
            'opening_hours' => 'required',
        ]);

        $salon = new Salon($validated);
        $salon->user_id = Auth::id();
        $salon->owner_image = $request->file('owner_image')->store('owner_images', 'public');
        $salon->image = $request->file('image')->store('salon_images', 'public');
        $salon->owner_bio = $request->owner_bio;
        $salon->specializations = $request->specializations;
        $salon->years_in_business = $request->years_in_business;
        $salon->number_of_stylists = $request->number_of_stylists;
        $salon->accepts_credit_cards = $request->accepts_credit_cards ?? false;
        $salon->save();

        // Proceed to payment
        return redirect()->route('salon.payment', $salon->id);
    }

    public function payment($id)
    {
        $salon = Salon::findOrFail($id);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt'         => 'rcpt_' . $salon->id,
            'amount'          => 20000, // ₹200 in paise
            'currency'        => 'INR'
        ];

        $razorpayOrder = $api->order->create($orderData);
        $salon->order_id = $razorpayOrder['id'];
        $salon->save();

        return view('salon.payment', [
            'order' => $razorpayOrder,
            'salon' => $salon,
            'razorpayKey' => env('RAZORPAY_KEY'),
        ]);
    }

    public function verify(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            $salon = Salon::where('order_id', $request->razorpay_order_id)->first();
            if ($salon) {
                $salon->payment_id = $request->razorpay_payment_id;
                $salon->is_approved = true;
                $salon->approved_at = now();
                $salon->save();
            }

           return redirect()->route('home')->with('success', 'Payment successful! Salon registered.');

        } catch (\Exception $e) {
            return redirect()->route('salon.create')->with('error', 'Payment verification failed.');
        }
    }
    
    public function show($id)
    {
        $salon = Salon::findOrFail($id);
        return view('salon.show', compact('salon'));
    }

}

