<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSendPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to_name = env('APP_NAME');
        $from_email = env('MAIL_FROM_ADDRESS');
        return $this->from($from_email, $to_name)
            ->subject('Your Account Password')
            ->view('emails.editor_password')
            ->with('details', $this->details);
    }
}
