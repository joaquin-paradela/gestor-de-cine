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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <!-- Fin menú navegación -->

    <!-- Contenido de la página -->

    <div class="row text-center">
        <h1 class="titulos">Películas</h1>
    </div>

    
       
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <a href="{{route('admin.peliculas.create')}}" class="btn btn-success Botones fs-3 mt-4">Agregar Película</a>
            </div>
        </div>

    <div class="container">
        <div class="container text-center"> 
            <section class="row" id="cartelera">
                @foreach ($peliculas as $pelicula)
                <div class="col-lg-3 col-md-4 col-sm-10">
                    <div class="card text-bg-dark text-center">
                        <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}" class="card-img-top">
                            
                        <div class="card-body text-start">
                            <h3>{{ $pelicula->titulo }}</h3>
                            <p>Duración: {{ $pelicula->duracion }}</p>
                            <p>Género: {{ $pelicula->genero->nombre }}</p>
                            <p>Actores Principales:</p>
                            <ul>
                                @foreach ($pelicula->actoresPrincipales as $actor)
                                    <li>{{ $actor->nombre_actor }}</li>
                                @endforeach
                            </ul> 
                            <div class="options text-center mt-3">
                                <a href="{{ route('admin.peliculas.edit', $pelicula->id) }}" class="btn btn-primary fs-5">Editar</a>
                                <form action="{{ route('admin.peliculas.destroy', $pelicula->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button id="btnEliminar" type="submit" class="btn btn-danger bg-danger fs-5">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script>
      
        var btnEliminar = document.getElementById('btnEliminar');

   
        btnEliminar.addEventListener('click', function (event) {
          
            var confirmacion = confirm('¿Estás seguro de que quieres eliminar esta película?');

            if (!confirmacion) {
                event.preventDefault();
            }
        });
        
    </script>

</body>
</html>
