<p>Appointment Details:</p>
<p>Customer: {{ $appointment->customer->name }}</p>
<p>Time: {{ $appointment->appointment_time }}</p>
<p>Status: {{ ucfirst($appointment->status) }}</p>