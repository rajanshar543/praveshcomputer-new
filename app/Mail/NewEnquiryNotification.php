<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewEnquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Website Enquiry - '.$this->enquiry['first_name'].' '.$this->enquiry['last_name'],
            replyTo: ! empty($this->enquiry['email']) ? [$this->enquiry['email']] : [],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.new-enquiry');
    }
}
