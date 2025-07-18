<?php
namespace App\Events;

use App\Models\Booking; // bookings table
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewAppointmentBooked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $booking;

    /**
     * Create a new event instance.
     *
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        // Load salon + salon user
        $this->booking = $booking->loadMissing('salon.user');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     * @throws \Exception
     */
    public function broadcastOn()
    {
        if (!$this->booking->salon) {
            throw new \Exception('Broadcast failed: Salon not found on booking ID ' . $this->booking->id);
        }

        if (!$this->booking->salon->user_id) {
            throw new \Exception('Broadcast failed: Salon user_id missing for booking ID ' . $this->booking->id);
        }

        return new Channel('salon.' . $this->booking->salon->user_id);
    }

    /**
     * Custom event name on frontend.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'new.booking';
    }

    /**
     * Data payload sent to frontend.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'booking' => [
                'id' => $this->booking->id,
                'name' => $this->booking->name,
                'appointment_time' => optional($this->booking->appointment_time)->toDateTimeString(),
                'salon_id' => $this->booking->salon_id,
                // 'user_name' => $this->booking->salon->user->name ?? null,
            ],
        ];
    }
}
