<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Películas</title>
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
        <h1>Películas</h1>
        <div class="options">
            <a href="#" class="btn btn-primary">Agregar Película</a>
        </div>

        <div class="peliculas">
            @foreach ($peliculas as $pelicula)
                <div class="pelicula">
                    <h3>{{ $pelicula->titulo }}</h3>
                    <p>Duración: {{ $pelicula->duracion }}</p>
                    <p>Género: {{ $pelicula->genero->nombre }}</p>
                    <p>Actores Principales:</p>
                    <ul>
                        @foreach ($pelicula->actoresPrincipales as $actor)
                            <li>{{ $actor->nombre_actor }}</li>
                        @endforeach
                    </ul>
                    <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}" class="imagen-pelicula">
                    <!-- Agrega más detalles de la película si lo deseas -->
                </div>
            @endforeach
        </div>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
