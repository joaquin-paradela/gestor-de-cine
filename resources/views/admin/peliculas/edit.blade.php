<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Editar Película</title>
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

    <!-- Contenido de la página -->
    <div class="container">
        <h1>Editar Película</h1>

        <form action="{{ route('admin.peliculas.update', $pelicula->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $pelicula->titulo }}" required>
            </div>

            <div class="form-group">
                <label for="duracion">Duración:</label>
                <input type="text" name="duracion" id="duracion" class="form-control" value="{{ $pelicula->duracion }}" required>
            </div>

            <div class="form-group">
                <label for="genero">Género:</label>
                <select name="genero" id="genero" class="form-control" required>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}" {{ $pelicula->genero_id == $genero->id ? 'selected' : '' }}>{{ $genero->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $pelicula->descripcion }}</textarea>
        </div>


            <div class="form-group">
            <label for="actoresPrincipales">Actores Principales:</label>
            <select name="actoresPrincipales[]" id="actoresPrincipales" class="form-control" multiple required>
                @foreach ($actoresPrincipales as $actor)
                    <option value="{{ $actor->id }}" {{ $pelicula->actoresPrincipales->contains($actor->id) ? 'selected' : '' }}>{{ $actor->nombre_actor }}</option>
                @endforeach
            </select>
        </div>


            <div class="form-group">
                <label for="nuevosActoresPrincipales">Agregar nuevos actores principales (separados por comas):</label>
                <input type="text" name="nuevosActoresPrincipales" id="nuevosActoresPrincipales" class="form-control">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}" style="max-width: 200px; margin-top: 10px;">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.peliculas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
