<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SalonRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $salon;  // Make it public so it's accessible in the Blade view

    public function __construct($salon)
    {
        $this->salon = $salon;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Salon Registration Successful',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.salon_registered',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}