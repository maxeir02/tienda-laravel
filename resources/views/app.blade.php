<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ecommerce')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script defer src="{{ asset('js/main.js') }}"></script>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="{{ route('ecommerce.index') }}">Inicio</a></li>
            <li><a href="{{ route('ecommerce.cart') }}">Carrito</a></li>
            <li><a href="{{ route('admin.products') }}">Admin Productos</a></li>
            <li><a href="{{ route('admin.categories') }}">Admin Categorías</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; 2025 Ecommerce - Todos los derechos reservados.</p>
</footer>

</body>
</html>
