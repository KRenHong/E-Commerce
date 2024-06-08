<?php

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        //
        $this->details =$details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject("Test Mail From Surfside Media")->view('mail.mail-view-lisaybt');
        return $this->subject("MESSAGE FROM SKINSENSE USER")->markdown('mail.mail');
    }
}