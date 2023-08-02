<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Géneros</title>
    <!-- Bootstrap -->
    <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="{{ secure_asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
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

    <div class="row">
        <h1 class="titulos text-center">Géneros</h1>
    </div>
    <div class="container">
        <div class="options text-center">
            <a href="{{ route('admin.generos.create') }}" class="btn btn-success fs-4 Botones">Agregar Género</a>
        </div>

        <div class="container text-center MinimoAnchoAlto"> 
            <section class="row justify-content-center" id="generos">
                <ul class="row justify-content-center">
                    <div class="col-4">
                        @foreach ($generos as $genero)
                            <li>
                                <div class="card  border border-primary rounded-2 text-bg-dark text-center">
                                    <div class="card-body row text-center fs-4 justify-content-center">
                                        <h3 class="text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 fs-3 col-8">{{ $genero->nombre }}</h3>
                                        <div class="options mt-3">
                                            <a href="{{ route('admin.generos.edit', $genero->id) }}" class="btn btn-primary fs-5">Editar</a>
                                            <form action="{{ route('admin.generos.destroy', $genero->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btnEliminar" type="submit" class="btn btn-danger bg-danger fs-5">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </div>
                </ul>
            </section>
        </div>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
        <script>
      
        var btnEliminar = document.getElementById('btnEliminar');

        btnEliminar.addEventListener('click', function (event) {
          
            var confirmacion = confirm('¿Estás seguro de que quieres eliminar este género?');

            if (!confirmacion) {
                event.preventDefault();
            }
        });
        
    </script>
</body>
</html>
