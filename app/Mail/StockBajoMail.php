<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;

class StockBajoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function build()
    {
        return $this->subject('⚠️ Alerta: Stock Bajo')
                    ->view('emails.stock_bajo')
                    ->with(['producto' => $this->producto]);
    }
}
