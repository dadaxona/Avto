<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;
    
    public $pin;
  
    public function __construct($pin)
    {
        $this->pin = $pin;
      
    }
 
    public function build()
    {
        return $this->subject('Thank you for subscribing to our newsletter')->markdown('emails');
    }
}
