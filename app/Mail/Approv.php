<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class Approv extends Mailable
{
    use Queueable, SerializesModels;

    public $user_id;
    public $form_id;
    public $status;
    public $company_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_id, $form_id, $company_name, $status )
    {
        $this->user_id = $user_id;
        $this->form_id = $form_id;
        $this->company_name = $company_name;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->user_id);
        $user_id = Auth::id();
        return $this->markdown('email.approv');
    }
}
