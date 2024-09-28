<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Booking extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($bookingDetails) 
    {
        $this->bookingDetails = $bookingDetails;
    }

    public function build()
    {
        return $this->subject('New Booking')
                    ->view('booking') // Pastikan view ini ada
                    ->with(['details' => $this->bookingDetails]);
    }
}
