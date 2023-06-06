<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Salas</title>
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
    <div class="container">
        <h1>Salas</h1>
        <div class="options">
            <a href="{{ route('admin.salas.create') }}" class="btn btn-primary">Agregar Sala</a>
        </div>
        <div class="container text-center"> 
            <section class="row" id="salas">
                <ul>
                    @foreach ($salas as $sala)
                        <li>
                            <div class="card text-bg-dark text-center">
                                <div class="card-body">
                                    <h3>{{ $sala->nombre }}</h3>
                                    <p>Tipo de Sala: {{ $sala->tipo_sala }}</p>
                                    <p>Capacidad de Asientos: {{ $sala->capacidad_asientos }}</p>
                                    <div class="options">
                                        <a href="{{ route('admin.salas.edit', $sala->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('admin.salas.destroy', $sala->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button id="btnEliminar" type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
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
          
            var confirmacion = confirm('¿Estás seguro de que quieres eliminar esta sala?');

            if (!confirmacion) {
                event.preventDefault();
            }
        });
        
    </script>
</body>
</html>
