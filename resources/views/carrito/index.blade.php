<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.app')
@section('title', 'Carrito de Compras')
@section('content')
    <h1 class="mb-4">Carrito de Compras</h1>
    <a href="{{ route('inicio') }}" class="btn btn-secondary mb-3">Volver al Inicio</a>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ $producto['precio'] }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $producto['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
</body>
</html>