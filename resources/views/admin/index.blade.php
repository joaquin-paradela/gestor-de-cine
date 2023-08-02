<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión de Cine - Admin</title>
        <!-- Bootstrap -->
        <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS Personalizado -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="{{ secure_asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
        .submenu {
            list-style: none;
            padding: 0;
            display: flex;
        }
        .submenu li {
            margin-right: 10px;
        }
        .submenu li:last-child {
            margin-right: 0;
        }
        .submenu li a {
            display: block;
            width: 150px; /* Modifica el ancho según tus necesidades */
            height: 80px; /* Modifica el alto según tus necesidades */
            text-align: center;
            line-height: 80px;
            font-size: 16px;
            color: #fff;
            background-color: #YourColorHere; /* Modifica el color según tus necesidades */
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
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
        
        <div class="options">
            <ul class="submenu">
                <li><a href="{{route('admin.peliculas.index')}}">Peliculas</a></li>
                <!-- Agrega más opciones según tus necesidades -->
                <li><a href="{{route('admin.funciones.index')}}">Funciones</a></li>
                <li><a href="{{route('admin.salas.index')}}">Salas</a></li>
                <li><a href="{{route('admin.generos.index')}}">Generos</a></li>
            </ul>
        </div>
    </div>
        <!-- Fin contenido de la página -->

        <!-- Inicio Footer -->
        @include('layouts.footer')
        <!-- Fin footer -->

        <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>