<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Historial de Compras</title>
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
    <div class="row">
        <h1 class="titulos text-center">Historial de Compras</h1>
    </div>

    <div class="container" id="HistorialCompra">
        <div class="row justify-content-center">
            <p class="text-center btn btn-primary">Mis puntos totales: {{ $puntostotales }}</p>
        </div>
        <table class="table text-center border border-white Tablas">
            <thead>
                <tr>
                    <th>Fecha de compra</th>
                    <th>Horario de compra</th>
                    <th>Película</th>
                    <th>Sala</th>
                    <th>Tipo sala</th>
                    <th>Cantidad de entradas</th>
                    <th>Precio total</th>
                    <th>Puntos obtenidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->fecha_compra }}</td>
                    <td>{{ $entrada->hora_compra }}</td>
                    <td>{{ $entrada->funcion->pelicula->titulo }}</td>
                    <td>{{ $entrada->funcion->sala->nombre }} </td>
                    <td>{{ $entrada->funcion->sala->tipo_sala}}</td>
                    <td>{{ $entrada->cantidad_entradas_compradas }}</td>
                    <td>{{ $entrada->precio_total }}</td>
                    <td>{{ $entrada->puntos_obtenidos }}</td>
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
</body>
</html>
