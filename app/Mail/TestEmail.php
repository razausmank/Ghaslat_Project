<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $headContent ;
    public $body ;
    public $footerContent ;

    public $subject ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $subject , $headContent = Null, $body = Null , $footerContent = Null)
    {
        $this->headContent = $headContent ;
        $this->body = $body ;
        $this->footerContent = $footerContent ;
        $this->subject = $subject ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.test')->from( getenv('MAIL_FROM_ADDRESS'), getenv("MAIL_FROM_NAME"))->subject($this->subject);
    }
}
