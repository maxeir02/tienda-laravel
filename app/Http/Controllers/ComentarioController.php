<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Articulo;
use App\Mail\NuevoComentarioMail;
use Illuminate\Support\Facades\Mail;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // 🔍 Validar los datos del formulario
        $request->validate([
            'articulo_id' => 'required|exists:articulos,id',
            'autor' => 'required|string|max:255',
            'contenido' => 'required|string'
        ]);

        // 📝 Crear el comentario en la base de datos
        $comentario = Comentario::create([
            'articulo_id' => $request->articulo_id,
            'autor' => $request->autor,
            'contenido' => $request->contenido
        ]);

        // ✅ Verificar que el comentario fue creado correctamente
        if ($comentario) {
            // 🏷️ Obtener el artículo y su autor
            $articulo = Articulo::findOrFail($request->articulo_id);
            $autor = $articulo->autor;

            // 📩 Enviar correo al autor del artículo
            if ($autor && filter_var($autor->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($autor->email)->send(new NuevoComentarioMail($comentario));
            }
        }

        // 🔄 Redireccionar con mensaje de éxito
        return back()->with('success', 'Comentario agregado y notificación enviada.');
    }
}
