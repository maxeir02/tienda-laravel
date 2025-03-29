<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Busca una categoría para asignarle productos
        $categoria = Categoria::first();

        if (!$categoria) {
            $categoria = Categoria::create([
                'nombre' => 'Categoría de prueba',
                'descripcion' => 'Descripción de prueba'
            ]);
        }

        Producto::create([
            'nombre' => 'laptop',
            'descripcion' => 'Portatil hp',
            'precio' => 99.99,
            'stock' => 10,
            'categoria_id' => $categoria->id
        ]);
    }
}
