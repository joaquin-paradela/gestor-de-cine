<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

//rutas para clientes logueados y no logueados 
Route::get('/', function () {
    return view('bienvenida');
});


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

//rutas del cliente logueado
Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas entradas/compras entradas
    Route::get('/boleteria/{peliculaId}', [EntradaController::class, 'boleteria'])->name('boleteria');
    Route::post('/boleteria/compra', [EntradaController::class, 'store'])->name('compra');
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
    
});

require __DIR__.'/auth.php';
