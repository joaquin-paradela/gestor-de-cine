<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine</title>
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

    <div class="row text-center" id="FilaPromociones">
        <h2>Promociones y Descuentos</h2>
    </div>
    <div class="row Separador"></div>

    <!-- Promociones -->
    <div class="row justify-content-center Promociones">
        <div class="container col col-lg-8 border-top border-bottom border-3 border-start-0 border-end-0">
            <div class="row">
                <div class="col col-lg-6">
                    <h4 class="text-start">Nueva promoción</h4>
                    <p>Por cada compra de entrada, obtendrás <strong>5</strong> puntos para ir acumulando hasta llegar para comprar entradas solo con puntos !</p>
                </div>
                <div class="col col-lg-6">
                    <img src="{{ asset('Imagenes/pelicula_2d.jpg') }}" alt="Películas 2D" class="col col-lg-4">
                </div>
            </div>
        </div>
    </div>
    <!-- Promociones -->
    <div class="row justify-content-center Promociones">
        <div class="container col col-lg-8 border-top border-bottom border-3 border-start-0 border-end-0">
            <div class="row">
                <div class="col col-lg-6">
                    <h4 class="text-start">Nueva promoción</h4>
                    <p>Por cada <strong>20</strong> puntos acumulados, puedes disfrutar de una promoción de 1 entrada cada 20 puntos en películas 2D y 3D.</p>
                </div>
                <div class="col col-lg-6">
                    <img src="{{ asset('Imagenes/pelicula_2d.jpg') }}" alt="Películas 2D" class="col col-lg-4">
                </div>
            </div>
        </div>
    </div>

   

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
