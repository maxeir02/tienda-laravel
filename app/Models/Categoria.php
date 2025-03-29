<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre correcto de la tabla

    protected $fillable = ['nombre', 'descripcion'];

    // Relación con Producto
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
