<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class EcommerceController extends Controller
{
    public function index() {
        $productos = Producto::all();
        $categorias = Categoria::all(); // Asegurar que se obtienen las categorías
    
        return view('ecommerce.index', compact('productos', 'categorias'));
    }

    public function productDetail($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id); // Usa 'categoria' en la relación
        return view('ecommerce.product-detail', compact('producto')); // Usa el mismo nombre que el archivo
    }

    public function removeFromCart($id) // ✅ Ahora está dentro de la clase
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Elimina el producto del carrito
            session()->put('cart', $cart);
        }

        return redirect()->route('ecommerce.index')->with('success', 'Producto eliminado del carrito.'); // Ruta corregida
    }
}
