@extends('layouts.header')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-white flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-xl border-t-4 border-indigo-500 transition-all hover:shadow-2xl">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
            <h2 class="mt-4 text-2xl font-bold text-gray-800">Complete Your Salon Registration</h2>
            <p class="mt-2 text-gray-600">One-time payment to list your salon on our platform</p>
        </div>

        <!-- Payment Details Card -->
        <div class="bg-indigo-50 rounded-lg p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-700 font-medium">Registration Fee</span>
                <span class="text-2xl font-bold text-indigo-600">₹200</span>
            </div>
            
            <div class="space-y-3 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Premium listing for 1 year</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Unlimited bookings</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>24/7 customer support</span>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <form action="{{ route('salon.payment.verify') }}" method="POST">
            @csrf
            <script 
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ $razorpayKey }}"
                data-amount="20000"
                data-currency="INR"
                data-order_id="{{ $order['id'] }}"
                data-buttontext="Pay ₹200 Now"
                data-name="Salon Platform"
                data-description="Salon Registration Fee"
                data-image="/logo.png"
                data-prefill.name="{{ $salon->owner_name }}"
                data-prefill.email="{{ $salon->owner_email }}"
                data-theme.color="#6366f1">
            </script>

            <!-- Hidden fields for server verification -->
            <input type="hidden" name="razorpay_order_id" value="{{ $order['id'] }}">
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        </form>

        <!-- Footer Note -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Secure payment powered by</p>
            <div class="flex justify-center mt-2">
                <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-6">
                    <path d="M15.56 5.547h3.063v12.899H15.56V5.547zM23.172 5.547h3.064v12.899h-3.064V5.547zM30.781 5.547h3.063v12.899h-3.063V5.547z" fill="#0F4C81"></path>
                    <path d="M47.828 12.896a4.194 4.194 0 01-4.195 4.195 4.194 4.194 0 01-4.196-4.195 4.194 4.194 0 014.196-4.195 4.194 4.194 0 014.195 4.195" fill="#F37254"></path>
                </svg>
            </div>
            <p class="mt-4">Need help? <a href="mailto:support@salonplatform.com" class="text-indigo-600 hover:underline">Contact our support</a></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Razorpay response
        window.addEventListener('rzp.response', function(e) {
            if(e.detail.razorpay_payment_id) {
                document.getElementById('razorpay_payment_id').value = e.detail.razorpay_payment_id;
                document.getElementById('razorpay_signature').value = e.detail.razorpay_signature;
                document.forms[0].submit();
            }
        });
    });
</script>
@endsection