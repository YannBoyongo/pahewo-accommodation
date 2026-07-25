<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingInquiryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your booking inquiry - Endo Wellness Accommodation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-inquiry-confirmation',
        );
    }
}
