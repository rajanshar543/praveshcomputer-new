<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewComplaintNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $complaint)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New '.$this->complaint['urgency'].' Repair Complaint - '.$this->complaint['name'],
            replyTo: ! empty($this->complaint['email']) ? [$this->complaint['email']] : [],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.new-complaint');
    }
}
