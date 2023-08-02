<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Compra realizada</title>
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
    <!-- Fin menú navegación -->

    <!-- Contenido de la página -->

    @if (session('success'))
        <div class="row text-center">
            <div class="alert alert-success fs-3 fw-semibold">
                {{ session('success') }}
            </div>
        </div>
        @endif
        @if (session('error'))
            <div class="row text-center">
                <div class="alert alert-danger fs-3 fw-semibold">
                    {{ session('error') }}
                </div>
            </div>
        @endif

    <div class="container text-center fs-4 mt-4">  
        <div class="container  MinimoAnchoAlto">
            <div class="container border border-primary bg-dark rounded-2 text-center pb-3 " id="containerCompraRealizada">
                <h2 class="btn btn-success fs-3 mt-5 pb-4 efectoTexto">¡Gracias por tu compra!<h2>
                <h3 class="btn btn-dark fs-5 mt-4 pb-2 border border-primary fs-3 font-monospace">Detalles de la compra<h3>
                
                <p class="mb-3 mt-3 pt-2 pb-2 fst-italic bg-dark">Cantidad de entradas: <strong class="bg-primary fw-bold rounded-2"> {{ $entrada->cantidad_entradas_compradas }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Precio unitario: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->precio_unitario }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Precio total: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->precio_total }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Puntos obtenidos: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->puntos_obtenidos }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Fecha de compra: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->fecha_compra }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Hora de compra: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->hora_compra }}</strong></p>      
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Función: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->funcion->sala->nombre }}</strong> Tipo de sala: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->funcion->sala->tipo_sala }}</strong></p>
                <p class="mb-3 mt-4 pt-2 pb-2 fst-italic bg-dark">Email del cliente: <strong class="bg-primary fw-bold rounded-2">{{ $entrada->usuario->email }}</strong></p>
            </div>
        </div>

        
        
       


        <!-- Otros elementos de la vista de compra realizada -->

    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
