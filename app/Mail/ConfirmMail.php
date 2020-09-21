<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;


    public $hash;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hash, $email)
    {
        $this->hash = $hash;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.confirm_mail');
    }
}
