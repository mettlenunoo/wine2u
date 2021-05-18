<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = "";
        //$address = 'dabdulmanan@gmail.com';
        $subject = 'Order From win2u';
        $name = 'wine2u - Order';

        return $this->view('mail.email')
                    ->from($address, $name)
                    ->cc($address, $name)
                   // ->bcc($address, $name) 
                    ->replyTo($this->data['order']->email, $this->data['order']->customer_name)
                    ->subject($subject)
                    ->with([ 'order' => $this->data['order'], 'orderProduct' => $this->data['orderProduct'], 'products' => $this->data['products'] ]);
    }
}
