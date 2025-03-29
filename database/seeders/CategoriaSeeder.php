<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria; // Asegúrate de usar 'Categoria' y no 'Category'

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::firstOrCreate([
            'nombre' => 'Electrónica',
            'descripcion' => 'Productos electrónicos',
        ]);

        Categoria::firstOrCreate([
            'nombre' => 'Ropa',
            'descripcion' => 'Moda y vestimenta',
        ]);
    }
}
