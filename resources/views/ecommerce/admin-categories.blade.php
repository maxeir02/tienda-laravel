@extends('layouts.app')

@section('title', 'Administrar Categorías')

@section('content')
<div class="container">
    <h1>Administrar Categorías</h1>
    
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre de la Categoría" required>
        <textarea name="description" placeholder="Descripción" required></textarea>
        <button type="submit">Guardar Categoría</button>
    </form>
</div>
@endsection
