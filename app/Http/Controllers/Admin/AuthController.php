<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión del administrador.
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Procesa el inicio de sesión del administrador.
     */
    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('username', 'password');

        // 🔐 Verificación de credenciales (En producción, usa la base de datos)
        if ($credentials['username'] === 'admin' && $credentials['password'] === '123456') {
            Session::put('admin_logged', true); // Guardar sesión de administrador
            return redirect()->route('admin.categorias.index');

        }

        // ❌ Credenciales incorrectas, redirigir con mensaje de error
        return back()->with('error', 'Credenciales incorrectas');
    }

    /**
     * Cierra la sesión del administrador.
     */
    public function logout()
    {
        Session::forget('admin_logged'); // Eliminar sesión
        return redirect()->route('admin.login'); // Redirigir al login
    }
}
