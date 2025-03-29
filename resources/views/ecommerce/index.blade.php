<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { display: flex; }
        .content { flex: 3; padding: 20px; }
        .cart { flex: 1; background: #f8f9fa; padding: 20px; position: fixed; right: 0; top: 0; height: 100vh; width: 300px; overflow-y: auto; box-shadow: -2px 0px 5px rgba(0,0,0,0.1); }
    </style>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="content">
        <h1>Catálogo de Productos</h1>

        <!-- 🔍 Filtro de Categorías -->
        <select id="categoriaFiltro" class="form-control mb-3">
            <option value="">Todas las categorías</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        <!-- 📦 Contenedor de Productos -->
        <div id="productos" class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4 producto" data-categoria="{{ $producto->categoria_id }}">
                    <div class="card">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ $producto->precio }}</p>
                            <a href="{{ route('ecommerce.productDetail', $producto->id) }}" class="btn btn-info">Ver Detalle</a>
                            <button class="btn btn-primary" onclick="agregarAlCarrito('{{ $producto->id }}', '{{ $producto->nombre }}', '{{ $producto->precio }}')">Agregar al Carrito</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 🛒 Carrito de Compras -->
<aside class="cart">
    <h2>Carrito de Compras</h2>
    <ul id="cart-items"></ul>
    <p><strong>Total:</strong> $<span id="total">0</span></p>

    <!-- 🔑 Botón para iniciar sesión como administrador -->
    <div class="text-center mt-3">
        <a href="{{ route('admin.login') }}" class="btn btn-dark w-100">Iniciar Sesión como Administrador</a>
    </div>
</aside>


    <!-- 🚀 Cargar el Script de Filtrado y Carrito -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/ecommerce.js') }}"></script>
</body>
</html>
