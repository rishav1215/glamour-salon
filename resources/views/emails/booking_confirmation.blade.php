<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Booked</title>
</head>
<body>
    <h2>New Appointment Booked!</h2>

    <p><strong>Salon:</strong> {{ $booking->salon->name }}</p>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Email:</strong> {{ $booking->email }}</p>
    <p><strong>Contact:</strong> {{ $booking->contact }}</p>
    <p><strong>Date & Time:</strong> {{ $booking->appointment_time->format('d M Y, h:i A') }}</p>
    <p><strong>Notes:</strong> {{ $booking->notes ?? 'None' }}</p>
</body>
</html>
