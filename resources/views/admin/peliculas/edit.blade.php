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
    <div class="row text-center">
        <h1 class="titulos">Editar Película</h1>
    </div>

    <div class="row justify-content-center MinimoAnchoAlto">
        <form action="{{ route('admin.peliculas.update', $pelicula->id) }}" class="row justify-content-center Formularios border border-primary rounded-2 mb-3" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-8">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $pelicula->titulo }}" required>
            </div>

            <div class="col-4">
                <label for="duracion">Duración:</label>
                <input type="text" name="duracion" id="duracion" class="form-control" value="{{ $pelicula->duracion }}" required>
            </div>
            <div class="col-8">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $pelicula->descripcion }}</textarea>
            </div>
            <div class="col-4">
                <label for="genero">Género:</label>
                <select name="genero_id" id="genero_id" class="form-control" required>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}" {{ $pelicula->genero_id == $genero->id ? 'selected' : '' }}>{{ $genero->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
        <div class="row mt-6">
            <div class="col-8">
                <label for="actoresPrincipales">Actores Principales:</label>
                <select name="actoresPrincipales[]" id="actoresPrincipales" class="form-control" multiple required>
                    @foreach ($actoresPrincipales as $actor)
                        <option value="{{ $actor->id }}" {{ $pelicula->actoresPrincipales->contains($actor->id) ? 'selected' : '' }}>{{ $actor->nombre_actor }}</option>
                    @endforeach
                </select>
                <label for="nuevosActoresPrincipales">Agregar nuevos actores principales (separados por comas):</label>
                <input type="text" name="nuevosActoresPrincipales" id="nuevosActoresPrincipales" class="form-control">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="col-4 d-flex justify-content-center align-items-end">
                        <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" class="border border-primary rounded-3" alt="{{ $pelicula->titulo }}" style="max-width: 240px;">  
            </div>
        </div>
        
            <div class="col-12 text-center mt-3 mb-3">
                <button type="submit" class="btn btn-primary bg-primary Botones">Guardar</button>
                <a href="{{ route('admin.peliculas.index') }}" class="btn btn-danger Botones">Cancelar</a>
            </div>
           <!--  <div class="col-6">
                
            </div> -->
        </form>
    </div>

    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
