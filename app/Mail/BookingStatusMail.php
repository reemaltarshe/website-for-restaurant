<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $book;


    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function envelope(): Envelope
    {

        $subject = $this->book->status == 'approved'
            ? 'تحديث حجزك في مطعم Feane - تم القبول! 🎉'
            : 'تحديث حجزك في مطعم Feane - نعتذر منك 😔';

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {

        return new Content(
            view: 'emails.booking_status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
