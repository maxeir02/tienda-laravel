<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompraRealizadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function build()
    {
        return $this->subject('Confirmación de Compra')
                    ->view('emails.compra-realizada')
                    ->with(['productos' => $this->productos]);
    }
}
