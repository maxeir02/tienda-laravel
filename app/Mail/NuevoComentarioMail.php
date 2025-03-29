<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comentario;

class NuevoComentarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comentario;

    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    public function build()
    {
        return $this->subject('Nuevo Comentario en tu Artículo')
                    ->view('emails.nuevo-comentario');
    }
}
