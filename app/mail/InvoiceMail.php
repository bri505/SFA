<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $emailSubject,
        public ?string $pdfContent = null,
        public ?string $xmlContent = null,
        public string $invoiceNumber = '',
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice'
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        if ($this->pdfContent !== null) {
            $attachments[] = Attachment::fromData(
                fn () => $this->pdfContent,
                $this->invoiceNumber . '.pdf'
            )->withMime('application/pdf');
        }

        if ($this->xmlContent !== null) {
            $attachments[] = Attachment::fromData(
                fn () => $this->xmlContent,
                $this->invoiceNumber . '.xml'
            )->withMime('application/xml');
        }

        return $attachments;
    }
}