<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $producto->nombre }}</h1>
        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">
        <p>{{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
        <p><strong>Stock:</strong> {{ $producto->stock }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
        <button class="btn btn-primary" onclick="agregarAlCarrito('{{ $producto->id }}', '{{ $producto->nombre }}', '{{ $producto->precio }}')">Agregar al Carrito</button>
        <a href="{{ route('ecommerce.index') }}" class="btn btn-secondary">Volver al Catálogo</a>
    </div>

    <script>
        function agregarAlCarrito(id, nombre, precio) {
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            carrito.push({ id, nombre, precio });
            localStorage.setItem("carrito", JSON.stringify(carrito));
            alert("Producto agregado al carrito");
        }
    </script>
</body>
</html>
