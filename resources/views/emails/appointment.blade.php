<h2>Hi {{ $appointment->name }}</h2>

<p>Your appointment is confirmed.</p>

<p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d M Y, h:i A') }}</p>
<p><strong>Salon Owner:</strong> ID {{ $appointment->salon_owner_id }}</p>

<p>Thanks for using our service!</p>
