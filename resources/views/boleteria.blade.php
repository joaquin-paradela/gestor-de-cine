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

        <h2>{{ $pelicula->titulo }}</h2>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf

            <!-- Selección de día -->
            <div class="form-group">
                <label for="day">Día:</label>
                <select class="form-control" id="fecha" name="fecha">
                    <option value="">Selecciona una fecha</option>
                    @foreach ($funciones->unique('fecha') as $funcion)
                    <option value="{{ $funcion->fecha }}">{{ $funcion->fecha }}</option>
                    @endforeach
                </select>
            </div>

         <!-- Horarios y Salas -->
        <div class="form-group">
            <label for="schedule">Seleccione Función:</label>
            <select class="form-control" id="hora_inicio" name="hora_inicio">
                <option value="">Selecciona un horario y sala</option>
                @foreach ($funciones as $funcion)
                    <option value="{{ $funcion->hora_inicio }}" data-fecha="{{ $funcion->fecha }}" style="display: none;">{{ $funcion->hora_inicio }} - {{ $funcion->sala->nombre }} - {{ $funcion->sala->tipo_sala }}</option>
                @endforeach
            </select>
        </div>
            <!-- Cantidad de entradas -->
            <div class="form-group">
                <label for="quantity">Cantidad de entradas:</label>
                <input type="number" class="form-control" id="cantidad_entradas_compradas" name="cantidad_entradas_compradas" min="1" value="1">
            </div>

            <!-- Capacidad asientos disponibles -->
            <div class="form-group">
                <label for="capacidad_asientos">Capacidad de asientos disponibles:</label>
                <div id="capacidad_asientos">{{ $funcion->sala->capacidad_asientos }}</div>
            </div>

            <!-- Precio entrada unitaria -->
            <div class="form-group">
                <label for="capacidad_asientos">Precio de entrada unitaria:</label>
                <div id="capacidad_asientos">{{ $funcion->precio_entrada }}</div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
        </form>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fecha').change(function() {
                var selectedFecha = $(this).val();
                $('#hora_inicio option').hide();
                $('#hora_inicio option[data-fecha="' + selectedFecha + '"]').show();
                $('#hora_inicio').val('');
            });
        });
    </script>
</body>
</html>
