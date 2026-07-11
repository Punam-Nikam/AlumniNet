<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Alumni;

class ConnectionRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $receiver;

    public function __construct(Alumni $sender, Alumni $receiver)
    {
        $this->sender   = $sender;
        $this->receiver = $receiver;
    }

    public function build()
    {
        return $this->subject('New Connection Request — AlumniNet')
                    ->view('emails.connection_request');
    }
}