<?php

namespace App\Events;

use App\Models\Booking;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewAppointmentBooked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking->load('salon.user'); // Eager load relationships
    }

    public function broadcastOn()
    {
        // Add validation to ensure salon and user exist
        if (!$this->booking->salon || !$this->booking->salon->user_id) {
            return [];
        }

        return new Channel('salon.'.$this->booking->salon->user_id);
    }

    public function broadcastAs()
    {
        return 'new.booking';
    }

    // Add this to control what data gets sent to the frontend
    public function broadcastWith()
    {
        return [
            'booking' => [
                'id' => $this->booking->id,
                'name' => $this->booking->name,
                'appointment_time' => $this->booking->appointment_time->toDateTimeString(),
                'salon_id' => $this->booking->salon_id,
                // Add other relevant fields
            ]
        ];
    }
}