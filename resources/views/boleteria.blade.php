<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Boletería</title>
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
        <h1>Boletería</h1>

        <!-- Selección de día -->
        <div class="form-group">
            <label for="day">Día:</label>
            <select class="form-control" id="day" name="day">
                <option value="">Selecciona un día</option>
                <option value="lunes">Lunes</option>
                <option value="martes">Martes</option>
                <option value="miercoles">Miércoles</option>
                <option value="jueves">Jueves</option>
                <option value="viernes">Viernes</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
            </select>
        </div>

        <!-- Horarios -->
        <div class="form-group">
            <label for="schedule">Seleccione Función:</label>
            <select class="form-control" id="schedule" name="schedule">
                <option value="">Selecciona un horario</option>
                <option value="10:00">10:00 AM</option>
                <option value="15:00">3:00 PM</option>
                <option value="20:00">8:00 PM</option>
            </select>
        </div>

        <!-- Cantidad de entradas -->
        <div class="form-group">
            <label for="quantity">Cantidad de entradas:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Comprar entradas</button>
        </div>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
