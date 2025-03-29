<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Bajo</title>
</head>
<body>
    <h2>⚠️ Alerta de Stock Bajo</h2>
    <p>El producto <strong>{{ $producto->nombre }}</strong> tiene un stock bajo.</p>
    <p>Stock actual: <strong>{{ $producto->stock }}</strong> unidades.</p>
    <p>Por favor, revisa el inventario y realiza un pedido si es necesario.</p>
</body>
</html>
