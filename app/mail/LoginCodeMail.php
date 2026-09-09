<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Código de acceso.
     */
    public function __construct(
        public string $code
    ) {
    }

    /**
     * Datos del correo.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Código de acceso - SFA'
        );
    }

    /**
     * Contenido del correo.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.login-code'
        );
    }

    /**
     * Adjuntos.
     */
    public function attachments(): array
    {
        return [];
    }
}
