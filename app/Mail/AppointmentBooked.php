<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;


    public $booking;
    /**
     * Create a new message instance.
     */
   
      public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    
   public function build()
    {
        return $this->subject('New Salon Appointment Booked')
                    ->view('emails.booking_confirmation') // ✅ Your actual email view
                    ->with(['bookings' => $this->booking]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Booked',
        );
    }

    /**
     * Get the message content definition.
     */
   

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
