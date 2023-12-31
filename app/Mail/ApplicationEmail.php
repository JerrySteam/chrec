<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientInfo;
    public $attachmentPaths;
    
    /**
     * Create a new message instance.
     */
    public function __construct($recipientInfo, $attachmentPaths)
    {
        $this->recipientInfo = $recipientInfo;
        $this->attachmentPaths = $attachmentPaths;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->recipientInfo['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->recipientInfo['body'],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if (empty($this->attachmentPaths)) {
            return $attachments;
        }
        
        foreach ($this->attachmentPaths as $fieldName => $filePath) {
            $originalFileName = pathinfo($filePath, PATHINFO_FILENAME);
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            $fileName = str_replace('_', ' ', $fieldName);
            $fileName = ucfirst($fileName);
            $absoluteFilePath = storage_path('app/' . $filePath);
            $attachments[] = Attachment::fromPath($absoluteFilePath)->as($fileName.'.'.$extension);
        }
        return $attachments;
    }
}
