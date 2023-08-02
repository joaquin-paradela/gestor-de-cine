<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Salas</title>
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
        <h1 class="titulos text-center">Salas</h1>
    </div>

    <div class="row justify-content-center">
        <div class="options col-12 text-center mt-2">
            <a href="{{ route('admin.salas.create') }}" class="btn btn-success Botones fs-3">Agregar Sala</a>
        </div>
        <div class="container text-center MinimoAnchoAlto"> 
            <section class="row justify-content-center" id="salas">
                <ul class="row justify-content-around">
                <div class="col-3">
                        @foreach ($salas as $sala)
                            <li>
                                <div class="card  border border-primary rounded-2 text-bg-dark text-center">
                                    <div class="card-body row text-center fs-4 justify-content-center">
                                        <h3 class="text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 col-3">{{ $sala->nombre }}</h3>
                                        <p>Tipo de Sala: {{ $sala->tipo_sala }}</p>
                                        <p>Capacidad de Asientos: {{ $sala->capacidad_asientos }}</p>
                                        <div class="options text-center mt-3 mb-2">
                                            <a href="{{ route('admin.salas.edit', $sala->id) }}" class="btn btn-primary fs-5">Editar</a>
                                       
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
          
            var confirmacion = confirm('¿Estás seguro de que quieres eliminar esta sala?');

            if (!confirmacion) {
                event.preventDefault();
            }
        });
        
    </script>
</body>
</html>
