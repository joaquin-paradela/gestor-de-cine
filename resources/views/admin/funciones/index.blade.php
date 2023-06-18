<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
     <!-- Menú de navegación -->
     <header>
        <div>
            @include('layouts.menunavigation')
        </div>     
    </header>
    <!-- Fin menú navegación -->
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
    <!-- Contenido de la página -->
    <div class="container">
        <h1>Funciones</h1>

        <!-- Botón para crear una nueva función -->
        <div class="options">
            <a href="{{ route('admin.funciones.create') }}" class="btn btn-primary">Crear Función</a>
        </div>

        <!-- Listado de funciones habilitadas -->
        <h2>Funciones habilitadas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora de inicio</th>
                    <th>Precio de entrada</th>
                    <th>Sala</th>
                    <th>Película</th>
                    <th>Tipo de sala</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterar sobre la lista de funciones habilitadas para mostrar cada una -->
                @foreach ($funcionesHabilitadas as $funcion)
                    <tr>
                        <td>{{ $funcion->fecha }}</td>
                        <td>{{ $funcion->hora_inicio }}</td>
                        <td>{{ $funcion->precio_entrada }}</td>
                        <td>{{ $funcion->sala->nombre }}</td>
                        <td>{{ $funcion->pelicula->titulo }}</td>
                        <td>{{ $funcion->sala->tipo_sala }}</td>
                        <td>
                            <!-- Botón de editar -->
                            <a href="{{ route('admin.funciones.edit', $funcion->id) }}" class="btn btn-primary">Editar</a>
                            <!-- Botón de eliminar -->
                            <form action="{{ route('admin.funciones.destroy', $funcion->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button id="btnEliminar" type="submit" class="btn btn-warning">Deshabilitar de cartelera</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Listado de funciones deshabilitadas -->
        <h2>Funciones deshabilitadas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora de inicio</th>
                    <th>Precio de entrada</th>
                    <th>Sala</th>
                    <th>Película</th>
                    <th>Tipo de sala</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterar sobre la lista de funciones deshabilitadas para mostrar cada una -->
                @foreach ($funcionesDeshabilitadas as $funcion)
                    <tr>
                        <td>{{ $funcion->fecha }}</td>
                        <td>{{ $funcion->hora_inicio }}</td>
                        <td>{{ $funcion->precio_entrada }}</td>
                        <td>{{ $funcion->sala->nombre }}</td>
                        <td>{{ $funcion->pelicula->titulo }}</td>
                        <td>{{ $funcion->sala->tipo_sala }}</td>
                        <td>
                        <a href="{{ route('admin.funciones.edit', $funcion->id) }}" class="btn btn-primary">Editar</a>
                            <!-- Botón de habilitar -->
                            <form action="{{ route('admin.funciones.restore', $funcion->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Habilitar en cartelera</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Fin contenido de la página -->
   
    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        var btnEliminar = document.getElementById('btnEliminar');

        btnEliminar.addEventListener('click', function (event) {
            var confirmacion = confirm('¿Estás seguro de que quieres deshabilitar esta película?');

            if (!confirmacion) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
