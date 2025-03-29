@extends('layouts.app')

@section('title', 'Administrar Productos')

@section('content')
<div class="container">
    <h1>Administrar Productos</h1>
    
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nombre del Producto" required>
        <textarea name="description" placeholder="Descripción" required></textarea>
        <input type="number" name="price" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="file" name="image" required>
        <button type="submit">Guardar Producto</button>
    </form>
</div>
@endsection
