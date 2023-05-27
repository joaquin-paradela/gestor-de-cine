<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión de Cine - Admin</title>
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
            <h1>Bienvenido, administrador</h1>
            <!-- Agrega aquí el contenido específico para la vista de administrador -->
             <div class="options">
                <a href="{{route('admin.peliculas.index')}}" class="btn btn-custom">Peliculas</a>
                <!-- Agrega más opciones según tus necesidades -->
                </div>
        </div>
        <!-- Fin contenido de la página -->

        <!-- Inicio Footer -->
        @include('layouts.footer')
        <!-- Fin footer -->

        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>