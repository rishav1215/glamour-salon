@foreach ($appointments as $appointment)
    <div>
        <p>Appointment with {{ $appointment->salonOwner->name }} at {{ $appointment->appointment_time }}</p>
        <p>Status: {{ ucfirst($appointment->status) }}</p>
        @if ($appointment->status == 'pending')
            <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" name="status" value="approved">Approve</button>
                <button type="submit" name="status" value="rejected">Reject</button>
                <button type="submit" name="status" value="time_changed">Change Time</button>
            </form>
        @endif
    </div>
@endforeach
