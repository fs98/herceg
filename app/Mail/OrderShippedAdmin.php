<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShippedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name, $last_name, $orderId, $receiptFile, $receiptName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $last_name, $orderId, $receiptFile, $receiptName)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->orderId = $orderId;
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
        return $this->markdown('emails.order.shipped-admin')
        ->to('organskaproizvodnjaherceg@gmail.com', 'OP Herceg')
        ->from('organskaproizvodnjaherceg@gmail.com', 'OP Herceg')
        ->subject('Imate novu narudžbu od ' .$this->first_name)
        ->attach($this->receiptFile, [
          'as' => $this->receiptName,
        ]);
    }
}
