<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FuncionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('bienvenida');
});

Route::get('/bienvenida', function () {
    return view('bienvenida');
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/promociones', function () {
    return view('promociones');
});

Route::get('/contacto', function () {
    return view('contacto');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //rutas peliculas
    Route::get('/peliculas/index', [PeliculaController::class, 'index'])->name('admin.peliculas.index');
    Route::get('/admin/peliculas', [PeliculaController::class, 'create'])->name('admin.peliculas.create');
    Route::post('/admin/peliculas/store', [PeliculaController::class, 'store'])->name('admin.peliculas.store');

    //rutas generos
    Route::get('/generos/index', [GeneroController::class, 'index'])->name('admin.generos.index');

 
    //rutas funciones
    Route::get('/admin/funciones', [FuncionController::class, 'create'])->name('admin.funciones.create');
    Route::get('/admin/funciones/index', [FuncionController::class, 'index'])->name('admin.funciones.index');
    Route::post('/admin/funciones/store', [FuncionController::class, 'store'])->name('admin.funciones.store');


    //rutas entradas/compras entradas
});

require __DIR__.'/auth.php';
