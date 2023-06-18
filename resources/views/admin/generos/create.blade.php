<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Género</title>
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
        <h1 class="titulos text-center">Crear Género</h1>
    </div>

    <div class="container MinimoAnchoAlto">
        <div class="row justify-content-center">
            <!-- Formulario para crear un género -->
            <form action="{{ route('admin.generos.store') }}" class="row justify-content-center border border-primary rounded-2" id="FormularioEditGenero" method="POST">
                @csrf

                <!-- Nombre del género -->
                <div class="col-10">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary Botones">Crear Género</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin contenido de la página -->
   
    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
