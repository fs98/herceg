<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $receiptFile, $receiptName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $receiptFile, $receiptName)
    {
        $this->email = $email;
        $this->receiptFile = $receiptFile;
        $this->receiptName = $receiptName; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order.shipped')
        ->to($this->email)
        ->from('trtom@gmail.com', 'Trgovina Tom')
        ->subject('Hvala na narudžbi')
        ->attach($this->receiptFile, [
          'as' => $this->receiptName,
        ]);
    }
}
