<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Categorías</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Administrar Categorías</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 📝 Formulario para crear nueva categoría -->
    <div class="card mb-4">
        <div class="card-header">Nueva Categoría</div>
        <div class="card-body">
            <form action="{{ route('admin.categorias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>

    <!-- 📂 Lista de Categorías -->
    <div class="card">
        <div class="card-header">Categorías Existentes</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td>
                                <!-- ✏️ Formulario para actualizar -->
                                <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nombre" value="{{ $categoria->nombre }}" required class="form-control mb-1">
                                    <input type="text" name="descripcion" value="{{ $categoria->descripcion }}" class="form-control mb-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                </form>

                                <!-- ❌ Formulario para eliminar -->
                                <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST">
                                     @csrf
                                    @method('DELETE')
                                     <button type="submit">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
</form>

</body>
</html>
