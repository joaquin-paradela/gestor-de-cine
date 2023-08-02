<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Función</title>
    <!-- Bootstrap -->
    <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
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
        <h1 class="titulos">Crear Función</h1>
    </div>

    <div class="container MinimoAnchoAlto align-items-center">
    
        <div class="row justify-content-center align-items-center">
            
            <!-- Formulario para crear una función -->
            <form class="Formularios row justify-content-center border border-primary rounded-2 mt-4" action="{{ route('admin.funciones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <!-- Fecha -->
                     <div class="col-6">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                        <!-- Hora de inicio -->
                     <div class="col-6">
                        <label for="hora_inicio">Hora de inicio:</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                    </div>
                    
                    <!-- Precio de entrada -->
                    <div class="col-6">
                        <label for="precio_entrada">Precio de entrada:</label>
                        <input type="number" class="form-control" id="precio_entrada" name="precio_entrada" step="0.01" required>
                    </div>

                    <!-- Selección de sala -->
                    <div class="col-6">
                        <label for="sala_id">Sala:</label>
                        <select class="form-control" id="sala_id" name="sala_id" required>
                            <option value="">Selecciona una sala</option>
                            <!-- Aquí puedes iterar sobre la lista de salas para mostrar las opciones -->
                            @foreach ($salas as $sala)
                                <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Selección de película -->
                    <div class="col-12">
                        <label for="pelicula_id">Película:</label>
                        <select class="form-control" id="pelicula_id" name="pelicula_id" required>
                            <option value="">Selecciona una película</option>
                            <!-- Aquí puedes iterar sobre la lista de películas para mostrar las opciones -->
                            @foreach ($peliculas as $pelicula)
                                <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 text-center">
                        <button type="submit" class="btn btn-primary fs-5">Crear Función</button>
                    </div>
            </form>
        </div>
    </div>
    <!-- Fin contenido de la página -->
   
    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
