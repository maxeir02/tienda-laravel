<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Producto;
use App\Models\Categoria;
use App\Mail\StockBajoMail;
use App\Mail\CompraRealizadaMail;

class EcommerceController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
    
        return view('ecommerce.index', compact('productos', 'categorias'));
    }

    public function productDetail($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('ecommerce.product-detail', compact('producto'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); 
            session()->put('cart', $cart);
        }

        return redirect()->route('ecommerce.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function comprar(Request $request)
    {
        // 🔹 Obtener el carrito desde la sesión
        $carrito = session()->get('cart', []);

        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío.');
        }

        $productosComprados = [];

        foreach ($carrito as $productoId => $cantidad) {
            $producto = Producto::find($productoId);

            if ($producto && $producto->stock >= $cantidad) {
                // 🔹 Reducir stock
                $producto->stock -= $cantidad;
                $producto->save();

                $productosComprados[] = [
                    'nombre' => $producto->nombre,
                    'cantidad' => $cantidad,
                    'precio' => $producto->precio,
                    'stock_restante' => $producto->stock
                ];

                // 🔹 Si el stock baja de 5, enviar alerta al administrador
                if ($producto->stock < 5) {
                    Mail::to('admin@example.com')->send(new StockBajoMail($producto));
                }
            } else {
                return back()->with('error', "Stock insuficiente para {$producto->nombre}.");
            }
        }

        // 🔹 Enviar correo de confirmación de compra si el usuario está autenticado
        if (auth()->check()) {
            Mail::to(auth()->user()->email)->send(new CompraRealizadaMail($productosComprados));
        }

        // 🔹 Vaciar carrito en sesión
        session()->forget('cart');

        return redirect()->route('ecommerce.index')->with('success', 'Compra realizada con éxito.');
    }
}
