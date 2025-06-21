<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Salon Booking</title>
</head>
<body>
    <h2>Welcome, {{ $user->name }}!</h2>
    <p>Thank you for registering on our salon booking platform.</p>
    <p>You can now book services from amazing salons near you.</p>
    <p>Login: <a href="{{ url('/login') }}">{{ url('/login') }}</a></p>
</body>
</html>
