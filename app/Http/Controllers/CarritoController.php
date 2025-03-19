<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = Session::get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    public function agregar(Producto $producto)
    {
        $carrito = Session::get('carrito', []);
        $carrito[$producto->id] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
        ];
        Session::put('carrito', $carrito);
        return redirect()->route('carrito.index');
    }

    public function eliminar(Producto $producto)
    {
        $carrito = Session::get('carrito', []);
        unset($carrito[$producto->id]);
        Session::put('carrito', $carrito);
        return redirect()->route('carrito.index');
    }
}