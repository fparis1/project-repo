<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class MessageCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Product
     */
    public $product;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Product $prodcuts
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = auth()->user()->email;
        return $this
        ->from("$mail")
        ->to('m.sljivic25@gmail.com')
        ->subject('Status of your ticket has been changed')
        ->markdown('status.changed');
    }
}
