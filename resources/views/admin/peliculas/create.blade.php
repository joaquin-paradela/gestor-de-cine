<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Agregar Película</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Menú de navegación -->
    <header>
        <div>
            @include('layouts.menunavigation')
        </div>
    </header>
    <!-- Fin menú navegación -->

    <!-- Formulario para agregar película -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="mt-5 mb-4">Agregar Película</h2>
                <form action="{{ route('admin.peliculas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (horas/minutos/segundos)</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="actores" class="form-label">Actores Principales</label>
                        <input type="text" class="form-control" id="actores_principales" name="actores_principales" placeholder="Ingrese los nombres de los actores principales separados por comas" required>
                    </div>
                    <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-control" id="genero_id" name="genero_id" required>
                        <option value="">Seleccione un género</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin formulario agregar película -->

    <!-- Inicio footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>

