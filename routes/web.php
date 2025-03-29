<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\InicioController;

// Página de inicio
Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Rutas del ecommerce
Route::get('/productos', [EcommerceController::class, 'index'])->name('ecommerce.index');
Route::get('/producto/{id}', [EcommerceController::class, 'productDetail'])->name('ecommerce.productDetail');
Route::get('/carrito', function () {
    return view('index');
})->name('ecommerce.cart');
Route::delete('/carrito/{id}', [EcommerceController::class, 'removeFromCart'])->name('ecommerce.cart.remove');


// Rutas de autenticación para el administrador
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Middleware para proteger rutas de administración
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    // Rutas de Categorías
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    // Rutas de Productos (Corregidas)
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});

