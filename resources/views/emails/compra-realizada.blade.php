<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #27ae60; }
        ul { padding: 0; list-style: none; }
        li { background: #f8f8f8; padding: 10px; margin: 5px 0; border-radius: 5px; }
        .footer { margin-top: 20px; font-size: 12px; color: gray; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra!</h1>
        <p>Estos son los productos que adquiriste:</p>
        <ul>
            @foreach($productos as $producto)
                <li><strong>{{ $producto['nombre'] }}</strong> - Cantidad: {{ $producto['cantidad'] }} - Precio: ${{ $producto['precio'] }}</li>
            @endforeach
        </ul>
        <p>¡Esperamos verte pronto!</p>
        <div class="footer">© {{ date('Y') }} Mi Ecommerce. Todos los derechos reservados.</div>
    </div>
</body>
</html>
