<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('productos.index') }}">Tienda Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('carrito.index') }}">Carrito</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4 text-center">
        <h1>Bienvenido a la Tienda Laravel</h1>
        <p>Explora nuestros productos y realiza tus compras de manera fácil y rápida.</p>
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
    </div>
</body>
</html>