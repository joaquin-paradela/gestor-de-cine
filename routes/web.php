<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SalaController;
use Illuminate\Support\Facades\Route;

//rutas para clientes logueados y no logueados 
Route::get('/', [FuncionController::class, 'carrusel'])->name('carrusel');

Route::get('/bienvenida', [FuncionController::class, 'carrusel'])->name('carrusel');

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/promociones', function () {
    return view('admin.promociones.index');
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

        //historial de compra
        Route::get('/historial', [EntradaController::class, 'historial'])->name('historial');
        
    });

    //rutas de administrador
    Route::middleware(['auth', RoleMiddleware::class])->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        //rutas peliculas
        Route::get('/peliculas/index', [PeliculaController::class, 'index'])->name('admin.peliculas.index');
        Route::get('/admin/peliculas', [PeliculaController::class, 'create'])->name('admin.peliculas.create');
        Route::post('/admin/peliculas/store', [PeliculaController::class, 'store'])->name('admin.peliculas.store');
        Route::get('/peliculas/{id}/edit', [PeliculaController::class, 'edit'])->name('admin.peliculas.edit');
        Route::put('/peliculas/{id}', [PeliculaController::class, 'update'])->name('admin.peliculas.update');
        Route::delete('/peliculas/{id}', [PeliculaController::class, 'destroy'])->name('admin.peliculas.destroy');

        //rutas generos
        Route::get('/generos/index', [GeneroController::class, 'index'])->name('admin.generos.index');
        Route::get('/generos/create', [GeneroController::class, 'create'])->name('admin.generos.create');
        Route::get('/generos/{id}/edit', [GeneroController::class, 'edit'])->name('admin.generos.edit');
        Route::put('/generos/{id}', [GeneroController::class, 'update'])->name('admin.generos.update');
        Route::delete('/generos/{id}', [GeneroController::class, 'destroy'])->name('admin.generos.destroy');
        Route::post('/admin/generos/store', [GeneroController::class, 'store'])->name('admin.generos.store');

        //rutas salas
        Route::get('/salas/index', [SalaController::class, 'index'])->name('admin.salas.index');
        Route::get('/salas/create', [SalaController::class, 'create'])->name('admin.salas.create');
        Route::get('/salas/{id}/edit', [SalaController::class, 'edit'])->name('admin.salas.edit');
        Route::put('/gsalas/{id}', [SalaController::class, 'update'])->name('admin.salas.update');
        Route::delete('/salas/{id}', [SalaController::class, 'destroy'])->name('admin.salas.destroy');
        Route::post('/admin/salas/store', [SalaController::class, 'store'])->name('admin.salas.store');

    
        //rutas funciones
        Route::get('/admin/funciones/create', [FuncionController::class, 'create'])->name('admin.funciones.create');
        Route::get('/admin/funciones/index', [FuncionController::class, 'index'])->name('admin.funciones.index');
        Route::post('/admin/funciones/store', [FuncionController::class, 'store'])->name('admin.funciones.store');
        Route::get('/funciones/{id}/edit', [FuncionController::class, 'edit'])->name('admin.funciones.edit');
        Route::put('/funciones/{id}', [FuncionController::class, 'update'])->name('admin.funciones.update'); 
        Route::delete('/funciones/{id}', [FuncionController::class, 'destroy'])->name('admin.funciones.destroy');
    });

require __DIR__.'/auth.php';
