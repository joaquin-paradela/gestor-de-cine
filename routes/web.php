<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

//rutas para clientes logueados y no logueados 
Route::get('/', [FuncionController::class, 'carrusel'])->name('carrusel');

Route::get('/bienvenida', [FuncionController::class, 'carrusel'])->name('carrusel');

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/promociones', function () {
    return view('promociones');
});

Route::get('/contacto', function () {
    return view('contacto');
});

//Ruta de busqueda para la funcion
Route::get('/buscar', [FuncionController::class, 'buscar'])->name('buscar');

//rutas del cliente logueado
Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas entradas/compras entradas
    Route::get('/boleteria/{peliculaId}', [EntradaController::class, 'boleteria'])->name('boleteria');
    Route::post('/boleteria/checkout', [EntradaController::class, 'checkout'])->name('checkout');
    Route::post('/boleteria/store', [EntradaController::class, 'store'])->name('store');
    Route::get('/comprarealizada/{entradaId}', [EntradaController::class, 'compraRealizada'])->name('comprarealizada');

    //puntos e historial de compra
    Route::get('/historial', [EntradaController::class, 'historial'])->name('historial');
    
});

    //rutas de administrador
Route::middleware(['auth', RoleMiddleware::class])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //rutas peliculas
    Route::get('/peliculas/index', [PeliculaController::class, 'index'])->name('admin.peliculas.index');
    Route::get('/admin/peliculas', [PeliculaController::class, 'create'])->name('admin.peliculas.create');
    Route::post('/admin/peliculas/store', [PeliculaController::class, 'store'])->name('admin.peliculas.store');

    //rutas generos
    Route::get('/generos/index', [GeneroController::class, 'index'])->name('admin.generos.index');

 
    //rutas funciones
    Route::get('/admin/funciones/create', [FuncionController::class, 'create'])->name('admin.funciones.create');
    Route::get('/admin/funciones/index', [FuncionController::class, 'index'])->name('admin.funciones.index');
    Route::post('/admin/funciones/store', [FuncionController::class, 'store'])->name('admin.funciones.store');

    
    // Ruta para mostrar el formulario de edición de una función
    Route::get('/funciones/{funcion}/edit', [FuncionController::class, 'edit'])->name('admin.funciones.edit');

    // Ruta para actualizar una función
    Route::put('/funciones/{funcion}', [FuncionController::class, 'update'])->name('admin.funciones.update');

    // Ruta para eliminar una función
    Route::delete('/funciones/{funcion}', [FuncionController::class, 'destroy'])->name('admin.funciones.destroy');

    // Ruta para mostrar el formulario de edición de la pelicula
    Route::get('/peliculas/{pelicula}/edit', [PeliculaController::class, 'edit'])->name('admin.peliculas.edit');

    // Ruta para actualizar una función
    Route::put('/peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('admin.peliculas.update');

    // Ruta para eliminar una función
    Route::delete('/peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('admin.peliculas.destroy');
    
});

require __DIR__.'/auth.php';
