@extends('layouts.header')

@section('content')
<div class="text-center mt-12">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4">Complete Payment to Register Your Salon</h2>

    <button id="rzp-button" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">
        Pay ₹100
    </button>

    <form id="verify-form" method="POST" action="{{ route('salon.payment.verify') }}">
    @csrf
    <input type="hidden" name="salon_id" value="{{ $salon->id }}">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
</form>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ $razorpay_key }}",
        "amount": "{{ $amount }}",
        "currency": "INR",
        "name": "Glamour Salon",
        "description": "Salon Registration",
        "order_id": "{{ $order_id }}",
        "handler": function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('verify-form').submit();
}

    };
    var rzp = new Razorpay(options);
    document.getElementById('rzp-button').onclick = function(e){
        rzp.open();
        e.preventDefault();
    }
</script>
@endsection
