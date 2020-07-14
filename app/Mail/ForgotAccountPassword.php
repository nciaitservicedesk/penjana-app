<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotAccountPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $email, $actKey, $name;

    public function __construct($t_name, $t_email, $t_actKey)
    {
        $this->name = $t_name;
        $this->email = $t_email;
        $this->actKey = $t_actKey;

        $this->subject('Forgot Password Request');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_NAME'))
        ->view('emails.requestReset')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'actKey' => $this->actKey,
        ]);
    }
}
