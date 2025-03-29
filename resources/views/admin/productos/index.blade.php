@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Productos</h1>
        
        <!-- Botón para agregar producto -->
        <a href="{{ route('admin.productos.store') }}" class="btn btn-primary mb-3">Agregar Producto</a>
        
        <!-- Tabla de productos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.productos.update', $producto->id) }}" class="btn btn-warning">Editar</a>
                            
                            <form action="{{ route('admin.productos.delete', $producto->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection