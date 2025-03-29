<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Comentario</title>
</head>
<body>
    <h2>Hola {{ $comentario->articulo->autor->name }},</h2>
    <p>Tu artículo "<strong>{{ $comentario->articulo->titulo }}</strong>" ha recibido un nuevo comentario:</p>

    <blockquote>
        "{{ $comentario->contenido }}"
    </blockquote>

    <p><strong>De:</strong> {{ $comentario->usuario->name }}</p>

    <p>Puedes ver el comentario completo aquí:</p>
    <a href="{{ url('/articulos/' . $comentario->articulo->id) }}">Ver Artículo</a>

    <p>Saludos,</p>
    <p><strong>El equipo de Tu Sitio</strong></p>
</body>
</html>
