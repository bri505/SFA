<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BulkInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $emailSubject,
        public string $emailMessage,
        public array $invoices = [],
        public array $attachmentsData = [],
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
            view: 'emails.bulk-invoice'
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->attachmentsData as $attachment) {

            if (
                empty($attachment['content']) ||
                empty($attachment['filename'])
            ) {
                continue;
            }

            $attachments[] = Attachment::fromData(
                fn () => $attachment['content'],
                $attachment['filename']
            )->withMime(
                $attachment['mime'] ?? 'application/octet-stream'
            );
        }

        return $attachments;
    }
}