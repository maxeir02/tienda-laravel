<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\StockBajoMail;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'stock', 'categoria_id'];

    protected static function boot()
    {
        parent::boot();

        // Detectar si el stock baja a menos de 5
        static::updated(function ($producto) {
            if ($producto->stock < 5) {
                // Enviar correo al administrador
                Mail::to('palaciojuanjose@gmail.com')->send(new StockBajoMail($producto));
            }
        });
    }

    // 🔗 Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
