<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeadSiteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $site;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($site)
    {

        $this->site = $site;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email.html')
                    ->text('email.text');

    }

}