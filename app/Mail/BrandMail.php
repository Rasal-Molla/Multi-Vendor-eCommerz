<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BrandMail extends Mailable
{
    use Queueable, SerializesModels;

    public $brand;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Brand Created Successfully',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'backend.pages.brand.brandMail',
            // with: [
            //     'brand_name' => $this->brand->brand_name,
            //     'brand_slug' => $this->brand->brand_slug,
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
