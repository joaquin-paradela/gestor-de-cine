<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Compra realizada</title>
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

        <p>¡Gracias por tu compra!</p>
        <p>Detalles de la compra:</p>
        
        <p>Cantidad de entradas: {{ $entrada->cantidad_entradas_compradas }}</p>
        <p>Precio unitario: {{ $entrada->precio_unitario }}</p>
        <p>Precio total: {{ $entrada->precio_total }}</p>
        <p>Puntos obtenidos: {{ $entrada->puntos_obtenidos }}</p>
        <p>Fecha de compra: {{ $entrada->fecha_compra }}</p>
        <p>Hora de compra: {{ $entrada->hora_compra }}</p>      
        <p>Función: {{ $entrada->funcion->sala->nombre }} Tipo de sala: {{ $entrada->funcion->sala->tipo_sala }} </p>
        <p>Email del cliente: {{ $entrada->usuario->email }} </p>

        
        
       


        <!-- Otros elementos de la vista de compra realizada -->

    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
